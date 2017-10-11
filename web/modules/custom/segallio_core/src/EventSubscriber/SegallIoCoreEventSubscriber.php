<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\segallio_core\SegallIoCore;
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
    $persistant = SegallIoCore::getPersistentAccessTokenStorage();

    if (!$github = $persistant->get('github')) {
      dpm('nothing. creating');
      $foo = new \stdClass();
      $foo->bar = 'a';
      $persistant->set('github', $foo);

      return;
    }
    dpm($github);
  }

}
