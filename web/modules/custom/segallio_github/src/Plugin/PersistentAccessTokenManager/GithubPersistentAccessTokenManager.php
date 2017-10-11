<?php

namespace Drupal\segallio_github\Plugin\PersistentAccessTokenManager;

use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerBase;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * @PersistentAccessTokenManager(
 *  id = "github",
 *  label = @Translation("GitHub."),
 * )
 */
class GithubPersistentAccessTokenManager extends PersistentAccessTokenManagerBase implements PersistentAccessTokenManagerInterface, ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function getAccessToken() {
    if (!$at = $this->loadAccessTokenFromDb()) {
      return;
    }

    return $at;
  }

  /**
   * {@inheritdoc}
   */
  public function setAccessToken($object) {
    // Check if the token exists in the DB.

    if (1) {
      // update the token and return the object.
    }

    // create a new one and return the object.
  }

  /**
   * {@inheritdoc}
   */
  public function isExpired() {
  }

}
