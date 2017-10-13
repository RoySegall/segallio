<?php

namespace Drupal\segallio_puller\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\segallio_puller\Plugin\PullerManager;

/**
 * Class SegallIoPullerPullersListControllers.
 */
class SegallIoPullerPullersListControllers extends ControllerBase {

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
   * Pullers.
   *
   * @return string
   *   Return Hello string.
   */
  public function pullers() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: pullers')
    ];
  }

}
