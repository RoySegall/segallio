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

}
