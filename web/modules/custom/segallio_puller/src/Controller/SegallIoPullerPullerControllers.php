<?php

namespace Drupal\segallio_puller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Link;
use Drupal\Core\Theme\ThemeManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\segallio_puller\Plugin\PullerManager;

/**
 * Class SegallIoPullerPullersListControllers.
 */
class SegallIoPullerPullerControllers extends ControllerBase {

  /**
   * @return array
   */
  public function pullManually($pull_id) {
    $batch = array(
      'title' => t('Pulling'),
      'operations' => array(
        array('\Drupal\segallio_puller\Controller\SegallIoPullerPullerControllers::pulling', [$pull_id]),
      ),
    );

    batch_set($batch);
    return batch_process('admin/pullers');
  }

  /**
   * Pulling manually the items.
   *
   * @param $puller_id
   */
  public function pulling($puller_id) {
    \Drupal::service('plugin.manager.puller')->createInstance($puller_id)->pull();
  }

}
