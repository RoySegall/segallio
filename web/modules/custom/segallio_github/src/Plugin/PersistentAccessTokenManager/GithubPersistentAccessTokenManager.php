<?php

namespace Drupal\segallio_github\Plugin\PersistentAccessTokenManager;

use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerBase;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @PersistentAccessTokenManager(
 *  id = "github",
 *  label = @Translation("The plugin ID."),
 * )
 */
class GithubPersistentAccessTokenManager extends PersistentAccessTokenManagerBase implements PersistentAccessTokenManagerInterface, ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function getAccessToken() {
    return 'a';
  }

  /**
   * {@inheritdoc}
   */
  public function setAccessToken() {
  }

  /**
   * {@inheritdoc}
   */
  public function isExpired() {
  }

}
