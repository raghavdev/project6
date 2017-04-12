<?php
 
/**
 
 * @file
 
 * Contains \Drupal\cloudfare_dashboard\Form\DNSForm
 
 */
 
namespace Drupal\cloudfare_dashboard\Form;
 
use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Url;


 
class DeleteForm extends ConfirmFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
   private $rid = NULL;
   private $content = NULL;
 
  public function getFormId() {
 
    return 'cloudfare_record_delete';
 
  }
 
  public function getQuestion() {
    return $this->t('Delete DNS record');  // Actually, a heading.
  }

  public function getDescription() {
    return $this->t('Are you sure you want to delete '.$this->content.' DNS?');
  }

  public function getConfirmText() {
    return $this->t('Delete');
  }

  public function getCancelUrl() {
    return new Url('cloudfare_dashboard.dashboard');
   
  }

   /**
     * {@inheritdoc}
     */
  public function getCancelText() {
        return $this->t('Cancel');
  }

  public function buildForm(array $form, 
                            FormStateInterface $form_state, 
                            $rid = NULL, $content = NULL) {
    $this->rid = $rid;
    $this->content = $content;
    return parent::buildForm($form, $form_state, $this->rid , $this->content);
  }

  public function submitForm(array &$form, 
                             FormStateInterface $form_state) {

    // Use $this->oid to update the database, etc. ...
    $dns_id = $this->rid;
    $result = $this->_delete_data($dns_id);
    if($result->success == 1 ) { 
      drupal_set_message("DNS Record ".$this->content." deleted");
    }else {
      drupal_set_message("DNS Record ".$this->content. " is not deleted, might be some problem with the Webserver.Please try after some time", 'error');
    }
    // Return to project listing page
    $form_state->setRedirect('cloudfare_dashboard.dashboard');

  }


 function _delete_data($dns_id) {
    $config = $this->config('cloudfare.settings');
  $username = $config->get('cloudfare.username');
  $api_key = $config->get('cloudfare.api_key');
  $password = $config->get('cloudfare.password');
  $enpoint = $config->get('cloudfare.endpoint');

  $zone_params = $enpoint.'zones';
  $zone = $this->_get_api_data($zone_params);
  $zone_id = $zone->result[0]->id;
  $output = '';
  $dns_params = $enpoint."zones/".$zone_id."/dns_records/".$dns_id;
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $dns_params);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
    
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


 protected function _save_api_data($data,$id = '') {

  $config = $this->config('cloudfare.settings');
  $username = $config->get('cloudfare.username');
  $api_key = $config->get('cloudfare.api_key');
  $password = $config->get('cloudfare.password');
  $enpoint = $config->get('cloudfare.endpoint');


  $zone_params = $enpoint.'zones';
  $zone = $this->_get_api_data($zone_params);
  $zone_id = $zone->result[0]->id;
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
