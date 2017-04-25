<?php

namespace Drupal\mta_megamenu\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'lirr_megamenu' Block.
 *
 * @Block(
 *   id = "lirr_megamenu_block",
 *   admin_label = @Translation("LIRR MegaMenu"),
 *   
 * )
 */
class lirr_megamenuBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  	$module_path = drupal_get_path('module', 'mta_megamenu');
   	$val = file_get_contents($module_path."/mta_megamenu/lirr_megamenu.html");
    $val .= '<script type="text/javascript">
      jkmegamenu.definemenu("menuanchor1", "menuone", "click", "left");
      jkmegamenu.definemenu("menuanchor2", "menutwo", "click", "left");
       
    </script>';
    return [
    '#theme' => 'mta_megamenu',
    '#mta_megamenu' => $val,
  ];

}
}