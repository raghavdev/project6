<?php

namespace Drupal\Servicestatus\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Servicestatus' Block.
 *
 * @Block(
 *   id = "servicestatus_block",
 *   admin_label = @Translation("Service Status"),
 * )
 */
class Servicestatus extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return array(
      '#theme' => 'Servicestatus',
      '#title' => 'Custom Service Now',
      '#markup' => '<div id="status-whole-block">ServiceNow Is here</div>',
    );
  }

}
