<?php

namespace Drupal\segallio_core\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class SegallIoHomePageController.
 */
class SegallIoHomePageController extends ControllerBase {

  /**
   * Home page.
   *
   * @return array
   *   Return Hello string.
   */
  public function homePage() {
    return [
      '#theme' => 'homepage',
      '#attached' => [
        'library' => [
          'segallio_theme/vue',
          'segallio_theme/timeline',
        ],
      ],
    ];
  }

}
