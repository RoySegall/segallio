<?php

namespace Drupal\segallio_facebook\Plugin\PersistentAccessTokenManager;

use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerBase;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerInterface;
use Facebook\Authentication\AccessToken;
use Facebook\Authentication\OAuth2Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @PersistentAccessTokenManager(
 *  id = "facebook",
 *  label = @Translation("Facebook."),
 * )
 */
class FacebookPersistentAccessToken extends PersistentAccessTokenManagerBase implements PersistentAccessTokenManagerInterface, ContainerFactoryPluginInterface {

  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManager $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $entity_type_manager);
//    $this->facebook = $plugin_network_manager->createInstance('social_auth_facebook')->getSdk();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getAccessToken() {

    if (!$at = $this->loadAccessTokenFromDb()) {
      return;
    }

    /** @var AccessToken $seralize */
    $seralize = unserialize($at->get('access_token')->value);

    if ($seralize->isExpired()) {
//      $oauth = new OAuth2Client($this->facebook->getApp(), $this->facebook->getClient());
//      $access_token = $oauth->getLongLivedAccessToken($this->accessToken);
//      $this->socialAuthFacebookPersistentDataHandler->set('access_token', $access_token);
    }

    return $seralize->getValue();
  }


}
