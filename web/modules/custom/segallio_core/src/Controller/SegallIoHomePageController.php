<?php

namespace Drupal\segallio_core\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Url;

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
          'segallio_theme/axios',
          'segallio_theme/timeline',
        ],
        'drupalSettings' => ['entries_base' => Url::fromRoute('segallio_restful.all_entries', [], ['absolute' => TRUE])->toString()]
      ],
    ];
  }

}
