<?php

namespace Drupal\segallio_facebook\Plugin\PersistentAccessTokenManager;

use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
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

    return unserialize($at->get('access_token')->value)->getValue();
  }


}
