<?php

namespace Drupal\segallio_core\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SegallIoBioController.
 */
class SegallIoBioController extends ControllerBase {

  /**
   * Bio.
   *
   * @return array
   *   Return Hello string.
   */
  public function bio() {
    return [
      '#type' => 'bio',
    ];
  }

}
