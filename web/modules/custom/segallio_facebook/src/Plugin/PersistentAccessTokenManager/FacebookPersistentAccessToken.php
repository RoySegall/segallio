<?php

namespace Drupal\segallio_facebook\Plugin\PersistentAccessTokenManager;

use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerBase;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;


/**
 * @PersistentAccessTokenManager(
 *  id = "facebook",
 *  label = @Translation("Facebook."),
 * )
 */
class FacebookPersistentAccessToken extends PersistentAccessTokenManagerBase implements PersistentAccessTokenManagerInterface, ContainerFactoryPluginInterface {

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
