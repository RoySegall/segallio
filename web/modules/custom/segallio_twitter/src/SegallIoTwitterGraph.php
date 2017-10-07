<?php

namespace Drupal\segallio_twitter;

use Abraham\TwitterOAuth\TwitterOAuth;
use Drupal\Core\Config\ConfigFactory;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SegallIoTwitterGraph implements SegallIoTwitterGraphInterface {

  /**
   * The session manager.
   *
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $session;

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
   * @param \Symfony\Component\HttpFoundation\Session\SessionInterface $session
   *   Used to store the access token into a session variable.
   */
  public function __construct(ConfigFactory $config, SessionInterface $session) {
    $this->config = $config->get('social_auth_twitter.settings');
    $this->session = $session;
  }

  /**
   * {@inheritdoc}
   */
  public function getTweets() {
    $access_token = $this->session->get('social_auth_twitter_access_token');
    $twitter = new TwitterOAuth($this->config->get('consumer_key'), $this->config->get('consumer_secret'), $access_token['oauth_token'], $access_token['oauth_token_secret']);
    return $twitter->get('statuses/user_timeline', array('screen_name' => $access_token['screen_name']));
  }

}
