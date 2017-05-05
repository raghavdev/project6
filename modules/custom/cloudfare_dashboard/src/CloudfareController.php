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

 public function cloudfare_dashboard_edit($rid = NULL, $zid = NULL) {
     $dns_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSForm',$rid, $zid);
      $build[]= array(
      'form' => $dns_form,

    );
      return $build;
 }

 public function cloudfare_overview() {

   $config = $this->config('cloudfare.settings');
   $enpoint = $config->get('cloudfare.endpoint');
   $zone_params = $enpoint.'zones';
   $zone = $this->_get_api_data($zone_params);
   if($zone->result_info->total_count > 0) {
    $row = array();
    // 
    $header = array(t('Zone Id'),t('Organization ID'),t('Website Name'),t('Status'), t('Details'),t('DNS List'));
    foreach($zone->result as $z => $val) {
      $zoneurl = Url::fromUserInput('/cloudflare-zone-details/'.$val->id); 
      $zonelink = Link::fromTextAndUrl(t("View Detail"), $zoneurl );
      $zonelink = $zonelink->toRenderable();
      $zonelink['#attributes'] = array('class' => array('internal'));
      $zone_details = render($zonelink);

      // DNS list url 

      $dnsurl = Url::fromUserInput('/cloudflare-dashboard/'.$val->id); 
      $dnsurllink = Link::fromTextAndUrl(t("View DNS list"), $dnsurl );
      $dnsurllink = $dnsurllink->toRenderable();
      $dnsurllink['#attributes'] = array('class' => array('internal'));
      $dnsurl_details = render($dnsurllink);


      $rows[] =   array(
                       array(  '#type' => 'markup', 'data' => $val->id ),
                       array(  '#type' => 'markup', 'data' => $val->owner->id ),
                       array(  '#type' => 'markup','data' => $val->name), 
                       array(  '#type' => 'markup', 'data' => $val->status),
                       array(  '#type' => 'markup','data' =>  $zone_details ), 
                       array(  '#type' => 'markup','data' =>  $dnsurl_details ), 
                   
                );
      
    }

    // Generate the table.
    $build['config_table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#sticky' => TRUE,
      '#no_striping' => TRUE,
    );

    }else{
      $output = "<strong>No Zone FOUND</strong>";
      $build = array(
      '#markup' => $output
      );
    }
 return $build;

 }



  public function cloudfare_zone_details() {

    $config = $this->config('cloudfare.settings');
    $enpoint = $config->get('cloudfare.endpoint');
    $zone_id = $config->get('cloudfare.zoneid');
    $zid = $zone_id;
    $zone_params = $enpoint.'zones';
    $zone_details = array();
    $zone = array();
    $zone_description_params = $enpoint."zones/".$zid;
    $zone_details['main'] = $this->_get_api_data($zone_description_params);
    $zone['name'] = ucfirst($zone_details['main']->result->name); 
    $zone['status'] = ucfirst($zone_details['main']->result->status); 
    $zone['status_original'] = $zone_details['main']->result->status; 
    $zone['id'] = ucfirst($zone_details['main']->result->id); 
    $zone['org_id'] = ucfirst($zone_details['main']->result->owner->id); 
    $zone['development_mode'] = 'Disabled'; 
    if($zone_details['main']->result->development_mode == 1) {
      $zone['development_mode'] = 'Enabled'; 
    }
    
    // cache level
    $cache_level_params = $enpoint."zones/".$zid."/settings/cache_level";
    $zone_details['cache_level_details'] = $this->_get_api_data($cache_level_params);
    if($zone_details['cache_level_details']->result->value == 'aggressive') {
      $zone['cache_level'] = 'Standard / Aggressive';
    }

    // security level
    $security_level_params = $enpoint."zones/".$zid."/settings/security_level";
    $zone_details['security_level'] = $this->_get_api_data($security_level_params);
    $zone['security_level'] = ucfirst($zone_details['security_level']->result->value);
  

    // ssl
    $ssl_params = $enpoint."zones/".$zid."/settings/ssl";
    $zone_details['ssl'] = $this->_get_api_data($ssl_params);
    $zone['ssl'] = ucfirst($zone_details['ssl']->result->value);


    //page rules
    $page_rules_params = $enpoint."zones/".$zid."/pagerules";
    $zone_details['pagerules'] = $this->_get_api_data($page_rules_params);
    $page_rule_count_left = 20 - count($zone_details['pagerules']->result); 
    $zone['page_rule_count'] = $page_rule_count_left;
    $zone['pagerules'] = array();
    $i = 0;
    foreach($zone_details['pagerules']->result as $pr) {
      $zone['pagerules'][$i]['val'] = $pr->targets[0]->constraint->value;
      $zone['pagerules'][$i]['id'] = ucfirst($pr->actions[0]->id);
    }


    //rate limits
    $rate_limits = $enpoint."zones/".$zid."/rate_limits";
    $zone_details['rate_limits'] = $this->_get_api_data($rate_limits);
    $zone['rate_limits_count'] =  $zone_details['rate_limits']->result_info->total_count;
    
    
    //firewall
    // firewall/access_rules/rules?scope_type=zone&mode=challenge&configuration_target=ip&configuration_value=1.2.3.4&notes=mynote&match=all" \
    $firewall = $enpoint."zones/".$zid."/firewall/access_rules/rules";
   
    $zone_details['firewall'] = $this->_get_api_data($firewall);
    $zone['access_rule_count'] =  $zone_details['firewall']->result_info->total_count;
    $firewall_array = (array) $zone_details['firewall']->result;
    $j= 0;
    foreach($firewall_array as $key => $f) {
      $zone['firewall'][$j]['ip_value'] = $f->configuration->value;
      $zone['firewall'][$j]['applies_to'] = $f->scope->type;
      $zone['firewall'][$j]['mode'] = $f->mode;
      $j++;
    }
      
    // challange passage Options
    $challange_params = $enpoint."zones/".$zid."/settings/challenge_ttl";
    $zone_details['challange_passage_options'] = $this->_get_api_data($challange_params);
    $challange_minutes  = (int)$zone_details['challange_passage_options']->result->value/60;
    $zone['challange_minutes'] =  $challange_minutes;

    $zone['details'] = (array) $zone_details;
    $build[] = array('#theme' => 'clodefare_zone_details', '#zone' => $zone);
    return $build;
    
  }



 public function cloudfare_dashboard() {
   $zone_details = $this->cloudfare_zone_details();
   
   $config = $this->config('cloudfare.settings');
   $enpoint = $config->get('cloudfare.endpoint');
   $zone_id = $config->get('cloudfare.zoneid');
   $zone_params = $enpoint.'zones';
   $zone = $this->_get_api_data($zone_params);
   $output = '';
   $dns_params = $enpoint."zones/".$zone_id."/dns_records";

  if($_GET['dns_search'] != ''){
    $name = urlencode($_GET['dns_search']);
    // ?type=A&name=example.com&content=127.0.0.1&page=1&per_page=20&order=type&direction=desc&match=all" \
    $dns_params .="?&name=".$name."&content=".$name."&match=any";
  }
  // 
  $dns = $this->_get_api_data($dns_params);
  $search_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSSearchForm',$zone_id);
   $dns_form = \Drupal::formBuilder()->getForm('Drupal\cloudfare_dashboard\Form\DNSForm',NULL,$zone_id);
  $zone_details[]= array(
      'form' => $search_form,

    );
  $zone_details[]= array(
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

       $editurl = Url::fromUserInput('/cloudflare-dashboard/'.$val->id.'/'.$zone_id.'/edit'); 
       $deleteurl = Url::fromUserInput('/cloudflare-dashboard/'.$val->id.'/'.$val->name.'/'.$zone_id.'/delete'); 
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
    $zone_details['config_table'] = array(
      '#theme' => 'table',
      '#header' => $header,
      '#rows' => $rows,
      '#sticky' => TRUE,
      '#no_striping' => TRUE,
    );

  }else{
    $output = "<strong>NO DNS Record FOUND</strong>";
    $zone_details['#markup'] = $output;
    
  }
 
  // The table description.
  // $build = $zone_details;
  

  return $zone_details;
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