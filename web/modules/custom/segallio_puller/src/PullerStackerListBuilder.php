<?php

namespace Drupal\segallio_puller;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;

/**
 * Defines a class to build a listing of Puller stacker entities.
 *
 * @ingroup segallio_puller
 */
class PullerStackerListBuilder extends EntityListBuilder {


  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Puller stacker ID');
    $header['name'] = $this->t('Name');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\segallio_puller\Entity\PullerStacker */
    $row['id'] = $entity->id();
    $row['name'] = Link::createFromRoute(
      $entity->label(),
      'entity.puller_stacker.edit_form',
      ['puller_stacker' => $entity->id()]
    );
    return $row + parent::buildRow($entity);
  }

}
