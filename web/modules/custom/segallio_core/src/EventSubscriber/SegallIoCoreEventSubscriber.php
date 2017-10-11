<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\segallio_core\SegallIoCore;
use Drupal\segallio_facebook\SegallIOFacebook;
use Drupal\segallio_github\SegallIoGithub;
use Drupal\segallio_instagram\SegallIoInstagram;
use Drupal\segallio_twitter\SegallIoTwitter;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class SegallIoCoreEventSubscriber.
 */
class SegallIoCoreEventSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events[KernelEvents::REQUEST][] = array('onRequest', -100);

    return $events;
  }

  /**
   * Initializes bargain core module requirements.
   */
  public function onRequest(GetResponseEvent $event) {
//    $twitter = SegallIoTwitter::getTwitterGraph();
//    dpm($twitter->getTweets(), 'fb');
//
//    $facebook = SegallIOFacebook::getFacebookGraph();
//    dpm($facebook->getPosts(), 'twitter');
//
//    $instagram = SegallIoInstagram::getApi();
//    dpm($instagram->getPosts(), 'instagram');
//
//
//    $instagram = SegallIoGithub::getApi();
//    dpm($instagram->getGists(), 'gh');

//    $entities = \Drupal::entityTypeManager()->getStorage('social_access_tokens')->loadMultiple();
//    \Drupal::entityTypeManager()->getStorage('social_access_tokens')->delete($entities);
  }

}
