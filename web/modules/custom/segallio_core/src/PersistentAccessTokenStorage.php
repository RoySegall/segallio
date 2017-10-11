<?php

namespace Drupal\segallio_core;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerManager;

/**
 * Class PersistentAccessTokenStorage.
 */
class PersistentAccessTokenStorage implements PersistentAccessTokenStorageInterface {

  /**
   * @var PersistentAccessTokenManagerManager
   */
  protected $PersistentManager;

  /**
   * Constructs a new PersistentAccessTokenStorage object.
   */
  public function __construct(PersistentAccessTokenManagerManager $persistent_access_token_manager_manager) {
    $this->PersistentManager = $persistent_access_token_manager_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function get($name) {
    return $this->PersistentManager->createInstance($name)->getAccessToken();
  }

  /**
   * {@inheritdoc}
   */
  public function set($name, $value) {
    return $this->PersistentManager->createInstance($name)->setAccessToken($value);
  }

}
