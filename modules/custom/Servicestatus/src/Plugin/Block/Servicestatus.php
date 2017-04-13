<?php

namespace Drupal\Servicestatus\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Servicestatus' Block.
 *
 * @Block(
 *   id = "mtaservice_block",
 *   admin_label = @Translation("MTA Service Status"),
 *   
 * )
 */
class Servicestatus extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#markup' => $this->t('This is content'),
      '#description' => 'Service Now',
      '#title' => 'Service Now',
  }

}
