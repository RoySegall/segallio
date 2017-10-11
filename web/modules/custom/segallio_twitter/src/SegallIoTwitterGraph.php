<?php

namespace Drupal\segallio_twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use Drupal\Core\Config\ConfigFactory;
use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SegallIoTwitterGraph implements SegallIoTwitterGraphInterface {

  /**
   * The session manager.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $accessToken;

  /**
   * Twitter configuration.
   *
   * @var \Drupal\Core\Config\ConfigFactory
   */
  protected $config;

  /**
   * TwitterLoginController constructor.
   *
   * @param \Drupal\Core\Config\ConfigFactory $config
   *   Used to get an instance of social_auth_twitter network plugin.
   * @param PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager
   */
  public function __construct(ConfigFactory $config, PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager) {
    $this->config = $config->get('social_auth_twitter.settings');
    $this->accessToken = $persistentAccessTokenManagerManager->get('twitter');
  }

  /**
   * {@inheritdoc}
   */
  public function getTweets() {
    $twitter = new TwitterOAuth(
      $this->config->get('consumer_key'),
      $this->config->get('consumer_secret'),
      $this->accessToken->oauth_token,
      $this->accessToken->oauth_token_secret
    );
    return $twitter->get('statuses/user_timeline', array('screen_name' => $this->accessToken->screen_name));
  }

}
