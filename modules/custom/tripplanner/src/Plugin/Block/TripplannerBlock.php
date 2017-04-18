<?php

namespace Drupal\tripplanner\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Tripplanner' Block.
 *
 * @Block(
 *   id = "mtaTripplanner_block",
 *   admin_label = @Translation("MTA Trip Planner"),
 *   
 * )
 */
class TripplannerBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  	$module_path = drupal_get_path('module', 'tripplanner');
   	$val = file_get_contents($module_path."/tripPlanner/mytrip.php");
    return [
    '#theme' => 'tripplanner',
    '#trip1' => $val,
  ];

}
}
