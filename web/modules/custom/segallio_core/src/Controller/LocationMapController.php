<?php

namespace Drupal\segallio_core\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class LocationMapController.
 */
class LocationMapController extends ControllerBase {

  /**
   * Location controller.
   *
   * @return array
   *   Return Hello string.
   */
  public function locationDetail() {
    return [
      '#theme' => 'location_detail',
    ];
  }

}
