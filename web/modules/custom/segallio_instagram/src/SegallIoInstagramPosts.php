<?php

namespace Drupal\segallio_instagram;

use Drupal\segallio_core\PersistentAccessTokenStorageInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use \GuzzleHttp\Client;

/**
 * Get posts from instgaram.
 */
class SegallIoInstagramPosts implements SegallIoInstagramPostsInterface {

  /**
   * @var \GuzzleHttp\Client
   */
  protected $httpClient;

  /**
   * The access token.
   *
   * @var string
   */
  protected $accessToken;

  /**
   * Constructing.
   *
   * @param PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager
   * @param \GuzzleHttp\Client $http_client
   */
  public function __construct(PersistentAccessTokenStorageInterface $persistentAccessTokenManagerManager, Client $http_client) {
    $this->accessToken = $persistentAccessTokenManagerManager->get('instagram');
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public function getMedia() {
    $response = $this->httpClient->get('https://api.instagram.com/v1/users/self/media/recent/?access_token=' . $this->accessToken);
    return json_decode($response->getBody()->getContents());
  }

}
