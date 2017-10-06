<?php

namespace Drupal\segallio_core\EventSubscriber;

use Drupal\social_auth_facebook\FacebookAuthManager;
use Drupal\social_auth_facebook\FacebookAuthPersistentDataHandler;
use Facebook\Facebook;
use Facebook\FacebookResponse;
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
    /** @var FacebookAuthPersistentDataHandler $facebook_data_persistant */
    $facebook_data_persistant = \Drupal::service('social_auth_facebook.persistent_data_handler');

    /** @var FacebookAuthManager $facebookManager */
    $networkManager = \Drupal::service('plugin.network.manager');

    /** @var Facebook $facebook */
    $facebook = $networkManager->createInstance('social_auth_facebook')->getSdk();

    /** @var FacebookResponse $response */
    $response = $facebook->get('me?fields=posts{permalink_url,comments,reactions,full_picture,message,shares}', $facebook_data_persistant->get('access_token')->getValue());

    dpm($response->getGraphNode()->asArray()['posts'][0]);

  }

}
