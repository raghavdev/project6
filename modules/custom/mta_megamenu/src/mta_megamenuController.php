<?php
/**
 * @file
 * Contains \Drupal\mta_megamenu\mta_megamenuController.
 */

namespace Drupal\mta_megamenu;



use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;


class mta_megamenuController extends ControllerBase {
  public function content() {
    return array(
        '#markup' => '' . t('Hello there, how are you!') . '',
    );
  }

}