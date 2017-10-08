<?php

namespace Drupal\segallio_instagram;

use Symfony\Component\HttpFoundation\Session\SessionInterface;
use \GuzzleHttp\Client;

/**
 * Get posts from instgaram.
 */
class SegallIoInstagramPosts implements SegallIoInstagramPostsInterface {

  /**
   * @var \Symfony\Component\HttpFoundation\Session\SessionInterface
   */
  protected $session;

  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * Constructing.
   *
   * @param SessionInterface $session
   * @param \GuzzleHttp\Client $http_client
   */
  public function __construct(SessionInterface $session, Client $http_client) {
    $this->session = $session;
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public function getPosts() {
    /** @var \League\OAuth2\Client\Token\AccessToken $access_token */
    $access_token = $this->session->get('instagram_access_token');
    $response = $this->httpClient->get('https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $access_token->getToken());

    return json_decode($response->getBody()->getContents());
  }

}
