<?php
 
/**
 
 * @file
 
 * Contains \Drupal\cloudfare_dashboard\Form\DNSSearchForm
 
 */
 
namespace Drupal\cloudfare_dashboard\Form;
 
use Drupal\Core\Form\FormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class DNSSearchForm extends FormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'DNS_Search_Form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state, $zoneid = NULL) {
 
    if($_GET['dns_search'] != ''){
       $name = $_GET['dns_search'];
    }
    $form['#method'] = 'get';
    $form['#action'] = '/cloudflare-dashboard/'.$zoneid;
    $form['dns_search']= array(
        '#type' => 'textfield',
        '#title' => t(''),
        '#size' => 60,
        '#maxlength' => 255, 
     );
    if($name != '' ) {
      $form['dns_search']['#default_value'] = $name;
    }
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Search DNS Record'),
      '#button_type' => 'primary',
    );
  return $form;

 
  }
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
  
    return parent::submitForm($form, $form_state);
 
  }
  
 
}
