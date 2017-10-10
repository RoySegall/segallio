<?php

namespace Drupal\segallio_core;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Social access tokens entities.
 *
 * @ingroup segallio_core
 */
class SocialAccessTokensListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Social access tokens ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\segallio_core\Entity\SocialAccessTokens */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.social_access_tokens.edit_form',
      ['social_access_tokens' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
