<?php

namespace Drupal\segallio_facebook;

use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Drupal\segallio_core\Plugin\PersistentAccessTokenManagerManager;
use Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler;
use Drupal\social_api\Plugin\NetworkManager;

/**
 * Class SegallIOFacebookGraph.
 */
class SegallIOFacebookGraph implements SegallIOFaecebookGraphInterface {

  /**
   * Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler definition.
   *
   * @var \Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler
   */
  protected $socialAuthFacebookPersistentDataHandler;

  /**
   * @var \Facebook\Facebook
   */
  protected $facebook;

  /**
   * The access token.
   *
   * @var string
   */
  protected $accessToken;

  /**
   * Constructs a new SegallIOFacebookGraph object.
   *
   * @param \Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler $social_auth_facebook_persistent_data_handler
   * @param \Drupal\social_api\Plugin\NetworkManager $plugin_network_manager
   * @param PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager
   */
  public function __construct(FacebookAuthPersistentDataHandler $social_auth_facebook_persistent_data_handler, NetworkManager $plugin_network_manager, PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager) {
    $this->socialAuthFacebookPersistentDataHandler = $social_auth_facebook_persistent_data_handler;
    $this->facebook = $plugin_network_manager->createInstance('social_auth_facebook')->getSdk();
    $this->accessToken = $persistentAccessTokenManagerManager->get('facebook');
  }

  /**
   * {@inheritdoc}
   */
  public function getFields($fields) {
    $response = $this->facebook->get($fields, $this->accessToken);
    return $response->getDecodedBody();
  }

  /**
   * {@inheritdoc}
   */
  public function getPosts() {
    return $this->getFields('me/posts?fields=permalink_url,comments.summary(true).limit(1),reactions.summary(true).limit(1),full_picture,message,shares,object_id')['data'];
  }

  /**
   * {@inheritdoc}
   */
  public function getAlbums() {
    return $this->getFields('me/albums?fields=description,comments.limit(1),reactions.limit(1),name,link,picture{url},object_id')['data'];
  }

  /**
   * {@inheritdoc}
   */
  public function getPhotos() {
    return $this->getFields('me/photos?fields=album,comments.summary(true).limit(1),reactions.summary(true).limit(1),link,name,shares,object_id')['data'];
  }

}
