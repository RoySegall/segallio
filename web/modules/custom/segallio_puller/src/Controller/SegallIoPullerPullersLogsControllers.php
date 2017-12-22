<?php

namespace Drupal\segallio_puller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Theme\ThemeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\segallio_puller\Plugin\PullerManager;

/**
 * Class SegallIoPullerPullersLogsControllers.
 */
class SegallIoPullerPullersLogsControllers extends ControllerBase {

  /**
   * @return array
   */
  public function logs($puller) {
    return [
      '#markup' => 'a',
    ];
  }

}
