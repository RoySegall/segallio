<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Status entity.
 *
 * @ingroup segallio_facebook
 *
 * @ContentEntityType(
 *   id = "status",
 *   label = @Translation("Status"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\segallio_facebook\StatusListBuilder",
 *     "views_data" = "Drupal\segallio_facebook\Entity\StatusViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\segallio_facebook\Form\StatusForm",
 *       "add" = "Drupal\segallio_facebook\Form\StatusForm",
 *       "edit" = "Drupal\segallio_facebook\Form\StatusForm",
 *       "delete" = "Drupal\segallio_facebook\Form\StatusDeleteForm",
 *     },
 *     "access" = "Drupal\segallio_facebook\StatusAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\segallio_facebook\StatusHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "status",
 *   admin_permission = "administer status entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/status/{status}",
 *     "add-form" = "/admin/content/status/add",
 *     "edit-form" = "/admin/content/status/{status}/edit",
 *     "delete-form" = "/admin/content/status/{status}/delete",
 *     "collection" = "/admin/content/status",
 *   },
 *   field_ui_base_route = "status.settings"
 * )
 */
class Status extends SegallIOFacebookEntityBase implements StatusInterface {

  use EntityChangedTrait;

  /**
   * {@inheritdoc}
   */
  public static function preCreate(EntityStorageInterface $storage_controller, array &$values) {
    parent::preCreate($storage_controller, $values);
    $values += [
      'user_id' => \Drupal::currentUser()->id(),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->get('name')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setName($name) {
    $this->set('name', $name);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getCreatedTime() {
    return $this->get('created')->value;
  }

  /**
   * {@inheritdoc}
   */
  public function setCreatedTime($timestamp) {
    $this->set('created', $timestamp);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwner() {
    return $this->get('user_id')->entity;
  }

  /**
   * {@inheritdoc}
   */
  public function getOwnerId() {
    return $this->get('user_id')->target_id;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwnerId($uid) {
    $this->set('user_id', $uid);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function setOwner(UserInterface $account) {
    $this->set('user_id', $account->id());
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public function isPublished() {
    return (bool) $this->getEntityKey('status');
  }

  /**
   * {@inheritdoc}
   */
  public function setPublished($published) {
    $this->set('status', $published ? TRUE : FALSE);
    return $this;
  }

  /**
   * {@inheritdoc}
   */
  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    $fields = parent::baseFieldDefinitions($entity_type);

    $fields['name']->setLabel(t('Status'));

    $fields['assets'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Assets'))
      ->setDescription(t('Assets(picture, video) which attached to the status.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -2,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE)
      ->setCardinality(FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED)
      ->setSetting('target_type', 'file');

    return $fields;
  }

}
