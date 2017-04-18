<?php
/**
 * @file
 * Contains \Drupal\Tripplanner\TripplannerController.
 */

namespace Drupal\Tripplanner;



use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Url;


class TripplannerController extends ControllerBase {
  public function content() {
    return array(
        '#markup' => '' . t('Hello there, how are you!') . '',
    );
  }

}