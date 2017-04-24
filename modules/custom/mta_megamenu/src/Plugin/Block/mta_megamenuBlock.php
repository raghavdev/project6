<?php

namespace Drupal\mta_megamenu\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'mta_megamenu' Block.
 *
 * @Block(
 *   id = "mta_megamenu_block",
 *   admin_label = @Translation("MTA MegaMenu"),
 *   
 * )
 */
class mta_megamenuBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
  	$module_path = drupal_get_path('module', 'mta_megamenu');
   	$val = file_get_contents($module_path."/mta_megamenu/mta_megamenu.html");
    $val .='<script type="text/javascript">
      jkmegamenu.definemenu("menuanchor1", "menuone", "click", "left");
      jkmegamenu.definemenu("menuanchor2", "menutwo", "click", "left");
      jkmegamenu.definemenu("menuanchor3", "menuthree", "click", "left");
      jkmegamenu.definemenu("menuanchor4", "menufour", "click", "left");  
      jkmegamenu.definemenu("menuanchor5", "menufive", "click", "right");
      jkmegamenu.definemenu("menuanchor6", "menusix", "click", "right");
      //jkmegamenu.definemenu("menuanchor7", "menuseven", "click", "right");
      //jkmegamenu.definemenu("menuanchor8", "menueight", "click", "right");
        
    </script>';
    return [
    '#theme' => 'mta_megamenu',
    '#mta_megamenu' => $val,
  ];

}
}
