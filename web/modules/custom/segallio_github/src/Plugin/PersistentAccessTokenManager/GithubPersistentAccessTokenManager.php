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

    $serialize = unserialize($at->get('access_token')->value);

    // todo: handle a real object.
    return $serialize;
  }

  /**
   * {@inheritdoc}
   */
  public function setAccessToken($object) {

    if ($entity = $this->loadAccessTokenFromDb()) {
      // update the token and return the object.
      $entity->set('access_token', $object);
      $entity->save();
    }

    return $this->setAccessTokenInDb($object);
  }

  /**
   * {@inheritdoc}
   */
  public function isExpired() {
  }

}
