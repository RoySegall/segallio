<?php

namespace Drupal\segallio_puller;

use Drupal\Core\Queue\QueueWorkerBase;
use Drupal\Core\Queue\QueueWorkerInterface;
use Drupal\segallio_puller\Plugin\PullerManager;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class SocialAssetsServicesManager.
 */
abstract class SegallIoPullerQueueWorkerBase extends QueueWorkerBase implements QueueWorkerInterface {

  /**
   * @var \Drupal\segallio_puller\Plugin\PullerManager
   */
  protected $puller;

  /**
   * @var array
   *
   * List of plugins to pull from.
   */
  protected $plugins;

  /**
   * Constructs a new MessageDeletionWorker object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param array $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\segallio_puller\Plugin\PullerManager $puller_manager
   *   The puller manager.
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, PullerManager $puller_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->puller = $puller_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('plugin.manager.puller')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function processItem($data) {
    foreach ($this->puller as $plugin) {
      $this->puller->createInstance($plugin)->pull();
    }
  }

}
