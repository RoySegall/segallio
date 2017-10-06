<?php

namespace Drupal\segallio_facebook;

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
   * Drupal\social_api\Plugin\NetworkManager definition.
   *
   * @var \Drupal\social_api\Plugin\NetworkManager
   */
  protected $pluginNetworkManager;

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
   */
  public function __construct(FacebookAuthPersistentDataHandler $social_auth_facebook_persistent_data_handler, NetworkManager $plugin_network_manager) {
    $this->socialAuthFacebookPersistentDataHandler = $social_auth_facebook_persistent_data_handler;
    $this->pluginNetworkManager = $plugin_network_manager;
    $this->facebook = $this->pluginNetworkManager->createInstance('social_auth_facebook')->getSdk();
    $this->accessToken = $this->socialAuthFacebookPersistentDataHandler->get('access_token')->getValue();
  }

  /**
   * {@inheritdoc}
   */
  public function getFields($fields) {
    $response = $this->facebook->get('me?fields=' . $fields, $this->accessToken);
    return $response->getGraphNode();
  }

  /**
   * {@inheritdoc}
   */
  public function getPosts() {
    return $this->getFields('posts{permalink_url,comments,reactions,full_picture,message,shares}')->getField('posts')->asArray();
  }

}
