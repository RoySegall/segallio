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
   * Drupal\segallio_puller\Plugin\PullerManager definition.
   *
   * @var \Drupal\segallio_puller\Plugin\PullerManager
   */
  protected $pluginManagerPuller;

  /**
   * Constructs a new SegallIoPullerPullersListControllers object.
   */
  public function __construct(PullerManager $plugin_manager_puller) {
    $this->pluginManagerPuller = $plugin_manager_puller;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('plugin.manager.puller')
    );
  }

  /**
   * @return array
   */
  public function pullManually($pull_id) {
    return ['#type' => 'markup','#markup' => 'Pulling from ' . $pull_id];
  }

}
