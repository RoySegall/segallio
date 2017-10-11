<?php

namespace Drupal\segallio_facebook\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class DefaultSubscriber.
 */
class DefaultSubscriber implements EventSubscriberInterface {

  /**
   * {@inheritdoc}
   */
  static function getSubscribedEvents() {
    $events['social_auth_facebook.scope'][] = array('socialAuthFacebookScope', -100);

    return $events;
  }

  /**
   * Set the permissions for the scope.
   *
   * @param GenericEvent $event
   */
  public function socialAuthFacebookScope(GenericEvent $event) {
    $event->setArgument('scope', ['public_profile', 'email', 'user_posts', 'user_photos']);
  }

}
