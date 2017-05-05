<?php
 
/**
 
 * @file
 
 * Contains \Drupal\cloudfare_dashboard\Form\CloudfareAdminSettingsForm
 
 */
 
namespace Drupal\cloudfare_dashboard\Form;
 
use Drupal\Core\Form\ConfigFormBase;
 
use Drupal\Core\Form\FormStateInterface;
 
class CloudfareAdminSettingsForm extends ConfigFormBase {
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function getFormId() {
 
    return 'cloudfare_config_form';
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function buildForm(array $form, FormStateInterface $form_state) {
 
    $form = parent::buildForm($form, $form_state);
 
    $config = $this->config('cloudfare.settings');
 
    $form['endpoint'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cloudflare Endpoint'),
      '#description' => t('The REST API Endpoint like https://api.cloudflare.com/client/v4/ '),
      '#default_value' => $config->get('cloudfare.endpoint', 'https://api.cloudflare.com/client/v4/'),
 
      '#required' => TRUE,
 
    );

    $form['username'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cloudflare Username'),
      '#description' => t('The REST API Username like jlm1@nreca.org'),
     
      '#default_value' => $config->get('cloudfare.username' , 'jlm1@nreca.org'),
 
      '#required' => TRUE,
 
    );
    $form['password'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cloudflare Password'),
      '#description' => t('The REST API password like C00peratives'),
 
      '#default_value' => $config->get('cloudfare.password', 'C00peratives'),
 
      '#required' => TRUE,
 
    );
 
 $form['api_key'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cloudflare API Key'),
      '#description' => t('The REST API KEY generate at My account page at https://www.cloudflare.com/a/account/my-account like 9feaabea9a4c651f06e1126160f74fba36a7a'),
 
      '#default_value' => $config->get('cloudfare.api_key', '9feaabea9a4c651f06e1126160f74fba36a7a'),
 
      '#required' => TRUE,
 
    );

 $form['zoneid'] = array(
 
      '#type' => 'textfield',
 
      '#title' => $this->t('Cloudflare Zone ID'),
      '#description' => t('The Zone ID of a domain like 537ab8bbbcff275f6846bfea4216c05b is for Cwbdevs.com'),
 
      '#default_value' => $config->get('cloudfare.zoneid', '537ab8bbbcff275f6846bfea4216c05b'),
 
      '#required' => TRUE,
 
    );
 
    return $form;
 
  }
 
  /**
 
   * {@inheritdoc}
 
   */
 
  public function submitForm(array &$form, FormStateInterface $form_state) {
 
    $config = $this->config('cloudfare.settings');
 
    $config->set('cloudfare.endpoint', $form_state->getValue('endpoint'));
 
    $config->set('cloudfare.username', $form_state->getValue('username'));
    $config->set('cloudfare.password', $form_state->getValue('password'));
    $config->set('cloudfare.api_key', $form_state->getValue('api_key'));
    $config->set('cloudfare.zoneid', $form_state->getValue('zoneid'));
    $config->save();
 
    return parent::submitForm($form, $form_state);
 
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
