<?php
 
/**
 
 * @file
 
 * Contains \Drupal\cloudfare_dashboard\Form\DNSForm
 
 */
 
namespace Drupal\cloudfare_dashboard\Form;
 
use Drupal\Core\Form\FormBase;
 
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\StringTranslation\TranslatableMarkup;
 
class DNSForm extends FormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'dns_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state,$rid = NULL, $zid= NULL) {

    $type_options = array("A" => "A", "AAAA" => "AAAA", "CNAME" => "CNAME", "TXT" => "TXT", "SRV" => "SRV","LOC" => "LOC", "MX" => "MX", "NS" => "NS", "SPF" => "SPF");
  $ttl_options = array(
    "1" => "Automatic TTL",
    "120" => "2 minutes",
    "300" => "5 minutes",
    "600" => "10 minutes",
    "900" => "15 minutes",
    "1800" => "30 minutes",
    "3600" => "1 hour",
    "7200" => "2 hours",
    "18000" => "5 hours",
    "43200" => "12 hours",
    "86400" => "1 day"
  );
  $zone_id = $zid;
  if(isset($rid)){
    $config = $this->config('cloudfare.settings');
    $username = $config->get('cloudfare.username');
    $api_key = $config->get('cloudfare.api_key');
    $zone_id = $config->get('cloudfare.zoneid');
    $password = $config->get('cloudfare.password');
    $enpoint = $config->get('cloudfare.endpoint');
  
    $zone_params = $enpoint.'zones';
    $zone = $this->_get_api_data($zone_params);
    
    if($zid != NULL) {
      $zone_id = $zid;
    }

    $output = '';
    $dns_params = $enpoint."zones/".$zone_id."/dns_records/".$rid;
    $dns = $this->_get_api_data($dns_params);
    $result  = $dns->result;
   }

   $form['zid'] = array(
      '#type' => 'hidden',
      '#value' => $zone_id,
    );

  $form['dns_type']= array(
       '#type' => 'select',
       '#title' => t('Type'),
       '#options' => $type_options,
       '#required' => TRUE,
  
  );
  
  $form['dns_name']= array(
       '#type' => 'textfield',
       '#title' => t('Name'),
       '#size' => 20,
      '#maxlength' => 255, 
      '#required' => TRUE,
  );
  $form['dns_content']= array(
       '#type' => 'textfield',
       '#title' => t('Value'),
       '#size' => 20,
       '#required' => TRUE,
  );
  $form['dns_ttl']= array(
       '#type' => 'select',
       '#title' => t('TTL'),
       '#options' => $ttl_options,
       '#required' => FALSE,
  );
    $form['dns_status']= array(
       '#type' => 'select',
       '#title' => t('Type'),
       '#options' => array("false" => "DNS Only","true" => "DNS and HTTP Proxy (CDN)"),
       '#required' => TRUE,
    );
  if(!empty($result)){
    $form['dns_type']['#default_value'] = $result->type;
    $form['dns_ttl']['#default_value'] = $result->ttl;
    $form['dns_content']['#default_value'] = $result->content;
    $form['dns_name']['#default_value'] = $result->name;
    $form['dns_status'] = $result->proxied;
    /*
 * Page callback for Source list
 * It will display all the source list with checkbox
 * DNA Status value from [proxied]
 * if [proxied] is empty means DNS Only
 * else if [proxied] is 1 then DNS and HTTP Proxy (CDN)
 */
  
    $form['rid'] = array(
      '#type' => 'hidden',
      '#value' => $result->id,
    );
     $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Update Record'),
      '#button_type' => 'primary',
    );
    
  }else{
     $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Add Record'),
      '#button_type' => 'primary',
    );
 
  }
 
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
  $values['dns_type'] = $form_state->getValue('dns_type');
  $values['dns_name'] = $form_state->getValue('dns_name');
  $values['dns_content'] = $form_state->getValue('dns_content');
  $values['dns_ttl'] = $form_state->getValue('dns_ttl');
  $values['dns_status'] = $form_state->getValue('dns_status');
  $values['zid'] = $form_state->getValue('zid');
  $values['rid'] = $form_state->getValue('rid');
  
  $values['op'] = $form_state->getValue('op')->getUntranslatedString();


  if($values['op'] == 'Update Record' && !empty($values['rid'])) {
    $data = array(
     'type' => $values['dns_type'],
     'name' => $values['dns_name'],
     'content' => $values['dns_content'],
     'ttl' => $values['dns_ttl'],
    );
    if( $values['dns_status'] == "true"){
      $data['proxied'] = TRUE;
    }else{
      $data['proxied'] = FALSE;
    }
    $result = $this->_save_api_data($data,$values['rid'], $values['zid']);
  }else{
    $data = array(
     'type' => $values['dns_type'],
     'name' => $values['dns_name'],
     'content' => $values['dns_content'],
     'ttl' => $values['dns_ttl'],
    );
    if( $values['dns_status'] == "true"){
      $data['proxied'] = TRUE;
    }else{
      $data['proxied'] = FALSE;
    }
    $result = $this->_save_api_data($data,NULL, $values['zid']);
  }

  if($result->success == 1 && $values['op'] != 'Update Record' ) { 
    drupal_set_message("DNS Record is added");
  }else if($result->success == 1 && $values['op'] == 'Update Record'){
    drupal_set_message("DNS Record has been Updated");
     $form_state->setRedirect('cloudfare_dashboard.dashboard',
  array('zid' => $values['zid']));
  }else{
    drupal_set_message("DNS is not added, might be some problem with the Webserver.Please try after some time", 'error');
    $form_state->setRedirect('cloudfare_dashboard.dashboard',
  array('zid' => $values['zid']));
  }
 
  }
 


 protected function _save_api_data($data,$id = '', $zid = NULL) {

  $config = $this->config('cloudfare.settings');
  $username = $config->get('cloudfare.username');
  $api_key = $config->get('cloudfare.api_key');
  $zone_id = $config->get('cloudfare.zoneid');
  $password = $config->get('cloudfare.password');
  $enpoint = $config->get('cloudfare.endpoint');


  $zone_params = $enpoint.'zones';
  $zone = $this->_get_api_data($zone_params);
   if($zid != NULL) {
      $zone_id = $zid;
   }
   
  $output = '';
  if($id != ''){
     $dns_params = $enpoint."zones/".$zone_id."/dns_records/".$id;
  }else {
    $dns_params = $enpoint."zones/".$zone_id."/dns_records";
  }

  $jdata = json_encode($data);
  
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $dns_params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_POSTFIELDS,$jdata);
  if($id != '') {
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
  }else {
    curl_setopt($ch, CURLOPT_POST, 1);
  }
  $headers = array();
  $headers[] = "X-Auth-Email: ".$username;
  $headers[] = "X-Auth-Key: ". $api_key;
  $headers[] = "Content-Type: application/json";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close ($ch);
  $data = json_decode($result);
  return $data;
 }



  protected function _get_api_data($url) {
  $config = $this->config('cloudfare.settings');
  $username = $config->get('cloudfare.username');
  $api_key = $config->get('cloudfare.api_key');
  $password = $config->get('cloudfare.password');
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);

  $headers = array();
  $headers[] = "X-Auth-Email: ".$username;
  $headers[] = "X-Auth-Key: ". $api_key;
  $headers[] = "Content-Type: application/json";
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

  $result = curl_exec($ch);
  if (curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
  }
  curl_close ($ch);
  $data = json_decode($result);
  return $data;
 }





  /**
 
   * {@inheritdoc}
 
   */
 
  protected function getEditableConfigNames() {
 
    return [
 
      'cloudfare.settings',
 
    ];
 
  }
 
}
