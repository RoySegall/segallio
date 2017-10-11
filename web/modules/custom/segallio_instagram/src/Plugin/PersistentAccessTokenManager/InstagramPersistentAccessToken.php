<?php

namespace Drupal\segallio_instagram\Plugin\PersistentAccessTokenManager;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerBase;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;


/**
 * @PersistentAccessTokenManager(
 *  id = "instagram",
 *  label = @Translation("Instagram."),
 * )
 */
class InstagramPersistentAccessToken extends PersistentAccessTokenManagerBase implements PersistentAccessTokenManagerInterface, ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function getAccessToken() {

    if (!$at = $this->loadAccessTokenFromDb()) {
      return;
    }

    /** @var \League\OAuth2\Client\Token\AccessToken $serialize */
    $serialize = unserialize($at->get('access_token')->value);

    return $serialize->getToken();
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

    $this->setAccessTokenInDb($object);

    return $this;
  }

}
