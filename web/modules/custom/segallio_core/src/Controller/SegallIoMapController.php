<?php

namespace Drupal\segallio_core\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SegallIoMapController.
 */
class SegallIoMapController extends ControllerBase {

  /**
   * Map.
   *
   * @return array
   *   Return the map.
   */
  public function map() {
    return [
      '#theme' => 'map',
    ];
  }

}
