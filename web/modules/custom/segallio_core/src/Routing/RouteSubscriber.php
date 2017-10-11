<?php

namespace Drupal\segallio_core\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

/**
 * Overrides some routes.
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

    if ($route = $collection->get('social_auth_github.redirect_to_github')) {
      $route->setDefault('_controller', '\Drupal\segallio_github\Controller\SegallIOGithubAuthController::redirectToGithub');
    }

    if ($route = $collection->get('social_auth_github.callback')) {
      $route->setDefault('_controller', '\Drupal\segallio_github\Controller\SegallIOGithubAuthController::callback');
    }

    if ($route = $collection->get('social_auth_facebook.return_from_fb')) {
      $route->setDefault('_controller', '\Drupal\segallio_facebook\Controller\SegallIoFacebookAuthController::returnFromFb');
    }
  }

}

