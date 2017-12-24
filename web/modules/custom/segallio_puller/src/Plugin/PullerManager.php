<?php

namespace Drupal\segallio_puller\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Puller plugin manager.
 */
class PullerManager extends DefaultPluginManager {


  /**
   * Constructs a new PullerManager object.
   *
   * @param \Traversable $namespaces
   *   An object that implements \Traversable which contains the root paths
   *   keyed by the corresponding namespace to look for plugin implementations.
   * @param \Drupal\Core\Cache\CacheBackendInterface $cache_backend
   *   Cache backend instance to use.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler to invoke the alter hook with.
   */
  public function __construct(\Traversable $namespaces, CacheBackendInterface $cache_backend, ModuleHandlerInterface $module_handler) {
    parent::__construct('Plugin/Puller', $namespaces, $module_handler, 'Drupal\segallio_puller\Plugin\PullerInterface', 'Drupal\segallio_puller\Annotation\Puller');

    $this->alterInfo('segallio_puller_puller_info');
    $this->setCacheBackend($cache_backend, 'segallio_puller_puller_plugins');
  }

}
