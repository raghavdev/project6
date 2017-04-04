<?php
/**
 * @file
 * Contains \Drupal\cloudfare_dashboard\CloudfareController.
 */

namespace Drupal\cloudfare_dashboard;



use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;


class CloudfareController extends ControllerBase {
  public function content() {
    return array(
        '#markup' => '' . t('Hello there, how are you!') . '',
    );
  }

 public function cloudfare_dashboard_edit($rid = NULL) {
     $dns_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSForm',$rid);
      $build[]= array(
      'form' => $dns_form,

    );
      return $build;
 }
 public function cloudfare_dashboard() {
   $config = $this->config('cloudfare.settings');
   $enpoint = $config->get('cloudfare.endpoint');
  $zone_params = $enpoint.'zones';
  $zone = $this->_get_api_data($zone_params);
  $zone_id = $zone->result[0]->id;
  $output = '';
  $dns_params = $enpoint."zones/".$zone_id."/dns_records";
  if($_GET['dns_search'] != ''){
    $name = urlencode($_GET['dns_search']);
    // ?type=A&name=example.com&content=127.0.0.1&page=1&per_page=20&order=type&direction=desc&match=all" \
    $dns_params .="?&name=".$name."&content=".$name."&match=any";
  }
  // 
  $dns = $this->_get_api_data($dns_params);
  $search_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSSearchForm',$parameter);
   $dns_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSForm',$parameter);
  $build[]= array(
      'form' => $search_form,

    );
  $build[]= array(
      'form' => $dns_form,

    );
  if($dns->result_info->count > 0){
    
      $row = array();
      $header = array(t('Type'),t('Name'), t('Value'), t('TTL'), t('Status'), t('Edit'), t('Delete'));

      foreach($dns->result as $val){
        if($val->type == 'A'){
          $value = "Points to ".$val->content;
        }elseif ($val->type == 'CNAME') {
          $value = "is an alias of ".$val->content;
        }
        if($val->ttl == 1){
          $ttl = 'Automatic';
        }else {
          $ttl = $val->ttl;
        }
        
        if($val->proxied != 1){
          $status = 'DNS Only';
        }else{
           $status = 'DNS and HTTP Proxy (CDN)';
        }

       $editurl = Url::fromUserInput('/cloudfare-dashboard/'.$val->id.'/edit'); 
       $deleteurl = Url::fromUserInput('/cloudfare-dashboard/'.$val->id.'/'.$val->name.'/delete'); 
		$editlink = Link::fromTextAndUrl(t("Edit"), $editurl);
		$deletelink = Link::fromTextAndUrl(t("Delete"), $deleteurl);

		$editlink = $editlink->toRenderable();
		$deletelink = $deletelink->toRenderable();

		$editlink['#attributes'] = array('class' => array('internal'));
		$deletelink['#attributes'] = array('class' => array('internal'));
		$edit = render($editlink);
		$delete = render($deletelink);
		$rows[] =   array(
        	             array(  '#type' => 'markup', 'data' => $val->type ),
        	             array(  '#type' => 'markup','data' => $val->name), 
        	             array(  '#type' => 'markup', 'data' => $value),
        	             array(  '#type' => 'markup','data' => $ttl), 
        	             array(  '#type' => 'markup', 'data' => $status ),
        	             array(  '#type' => 'markup','data' =>  $edit ), 
        	             array(  '#type' => 'markup','data' =>  $delete ), 
        	         
			          );
            
      
    }

    //$output .= theme_table(array('header' => $header,'rows' => $row,'sticky' => TRUE));
    // Generate the table.
    $build['config_table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#sticky' => TRUE,
      '#no_striping' => TRUE,
    );

  }else{
    $output = "<strong>NO DNS Record FOUND</strong>";
    $build = array(
      '#markup' => $output
    );
  }
  // The table description.
    
 
    
 // _delete_data('acf004b2c45bbab53b5856982e28bf8a');
  return $build;
  }


  public function _get_api_data($url) {
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


 

}