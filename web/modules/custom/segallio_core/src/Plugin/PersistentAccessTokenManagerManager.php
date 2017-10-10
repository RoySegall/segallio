<?php

namespace Drupal\segallio_core\Plugin;

use Drupal\Core\Plugin\DefaultPluginManager;
use Drupal\Core\Cache\CacheBackendInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;

/**
 * Provides the Persistent access token manager plugin manager.
 */
class PersistentAccessTokenManagerManager extends DefaultPluginManager {

  /**
   * Constructs a new PersistentAccessTokenManagerManager object.
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
    parent::__construct('Plugin/PersistentAccessTokenManager', $namespaces, $module_handler, 'Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface', 'Drupal\segallio_core\Annotation\PersistentAccessTokenManager');

    $this->alterInfo('segallio_core_persistent_access_token_manager_info');
    $this->setCacheBackend($cache_backend, 'segallio_core_persistent_access_token_manager_plugins');
  }

}
