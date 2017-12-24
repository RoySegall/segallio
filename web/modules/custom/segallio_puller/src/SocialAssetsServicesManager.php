<?php

namespace Drupal\segallio_puller;
use Drupal\segallio_core\SocialAssetsServicesManagerInterface;
use Drupal\segallio_facebook\SegallIOFacebookGraph;
use Drupal\segallio_github\SegallIoGithubApiInterface;
use Drupal\segallio_instagram\SegallIoInstagramPostsInterface;
use Drupal\segallio_twitter\SegallIoTwitterGraphInterface;

/**
 * Class SocialAssetsServicesManager.
 */
class SocialAssetsServicesManager implements SocialAssetsServicesManagerInterface {

  /**
   * @var SegallIoGithubApiInterface
   */
  protected $github;

  /**
   * @var SegallIOFacebookGraph
   */
  protected $facebook;

  /**
   * @var SegallIoInstagramPostsInterface
   */
  protected $instagram;

  /**
   * @var SegallIoTwitterGraphInterface
   */
  protected $twitter;

  /**
   * SocialAssetsServicesManager constructor.
   * @param SegallIoGithubApiInterface $github
   * @param SegallIOFacebookGraph $facebook
   * @param SegallIoInstagramPostsInterface $instagram
   * @param SegallIoTwitterGraphInterface $twitter
   */
  public function __construct(SegallIoGithubApiInterface $github, SegallIOFacebookGraph $facebook, SegallIoInstagramPostsInterface $instagram, SegallIoTwitterGraphInterface $twitter) {
    $this->github = $github;
    $this->facebook = $facebook;
    $this->instagram = $instagram;
    $this->twitter = $twitter;
  }

  /**
   * {@inheritdoc}
   */
  public function servicesRouter($social_network) {
    return $this->{$social_network};
  }

}
