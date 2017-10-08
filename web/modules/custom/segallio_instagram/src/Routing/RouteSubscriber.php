<?php

namespace Drupal\segallio_instagram\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    if ($route = $collection->get('social_auth_instagram.redirect_to_instagram')) {
      $route->setDefault('_controller', '\Drupal\segallio_instagram\Controller\SegallIoInstagramAuthController::redirectToInstagram');
    }

    if ($route = $collection->get('social_auth_instagram.callback')) {
      $route->setDefault('_controller', '\Drupal\segallio_instagram\Controller\SegallIoInstagramAuthController::callback');
    }
  }

}

