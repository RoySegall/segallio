<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\segallio_core\SegallIoCore;
use Drupal\segallio_facebook\SegallIOFacebook;
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
//    $persistant = SegallIoCore::getPersistentAccessTokenStorage();
//    dpm($persistant->get('facebook'));

//    dpm(SegallIOFacebook::getFacebookGraph()->getPosts());

//    $entities = \Drupal::entityTypeManager()->getStorage('social_access_tokens')->loadMultiple();
//    \Drupal::entityTypeManager()->getStorage('social_access_tokens')->delete($entities);
  }

}
