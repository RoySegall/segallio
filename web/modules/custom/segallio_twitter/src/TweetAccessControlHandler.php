<?php

namespace Drupal\segallio_twitter;

use Drupal\Core\Entity\EntityAccessControlHandler;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Access\AccessResult;

/**
 * Access controller for the Tweet entity.
 *
 * @see \Drupal\segallio_twitter\Entity\Tweet.
 */
class TweetAccessControlHandler extends EntityAccessControlHandler {

  /**
   * {@inheritdoc}
   */
  protected function checkAccess(EntityInterface $entity, $operation, AccountInterface $account) {
    /** @var \Drupal\segallio_twitter\Entity\TweetInterface $entity */
    switch ($operation) {
      case 'view':
        if (!$entity->isPublished()) {
          return AccessResult::allowedIfHasPermission($account, 'view unpublished tweet entities');
        }
        return AccessResult::allowedIfHasPermission($account, 'view published tweet entities');

      case 'update':
        return AccessResult::allowedIfHasPermission($account, 'edit tweet entities');

      case 'delete':
        return AccessResult::allowedIfHasPermission($account, 'delete tweet entities');
    }

    // Unknown operation, no opinion.
    return AccessResult::neutral();
  }

  /**
   * {@inheritdoc}
   */
  protected function checkCreateAccess(AccountInterface $account, array $context, $entity_bundle = NULL) {
    return AccessResult::allowedIfHasPermission($account, 'add tweet entities');
  }

}
