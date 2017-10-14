<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\segallio_core\SocialAssetsServicesManager;
use Drupal\segallio_puller\Plugin\PullerManager;
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
    /** @var SocialAssetsServicesManager $foo */
    $foo = \Drupal::service('plugin.manager.puller');

//    $foo->createInstance('facebook_posts')->pull();

//    dpm($foo->createInstance('facebook_posts')->assets());
//    $twitter = SegallIoTwitter::getTwitterGraph();
//    dpm($twitter->getTweets(), 'fb');
//
//    $facebook = SegallIOFacebook::getFacebookGraph();
//    dpm($facebook->getPosts(), 'twitter');
//
//    $instagram = SegallIoInstagram::getApi();
//    dpm($instagram->getPosts(), 'instagram');
//
//    $instagram = SegallIoGithub::getApi();
//    dpm($instagram->getGists(), 'gh');

    $et = 'status';
//    $entities = \Drupal::entityTypeManager()->getStorage($et)->loadMultiple();
//    \Drupal::entityTypeManager()->getStorage($et)->delete($entities);
  }

}
