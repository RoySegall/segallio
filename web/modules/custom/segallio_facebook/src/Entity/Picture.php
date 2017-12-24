<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Picture entity.
 *
 * @ingroup segallio_facebook
 *
 * @ContentEntityType(
 *   id = "picture",
 *   label = @Translation("Picture"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\segallio_facebook\PictureListBuilder",
 *     "views_data" = "Drupal\segallio_facebook\Entity\PictureViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\segallio_facebook\Form\PictureForm",
 *       "add" = "Drupal\segallio_facebook\Form\PictureForm",
 *       "edit" = "Drupal\segallio_facebook\Form\PictureForm",
 *       "delete" = "Drupal\segallio_facebook\Form\PictureDeleteForm",
 *     },
 *     "access" = "Drupal\segallio_facebook\PictureAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\segallio_facebook\PictureHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "picture",
 *   admin_permission = "administer picture entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/picture/{picture}",
 *     "add-form" = "/admin/picture/add",
 *     "edit-form" = "/admin/picture/{picture}/edit",
 *     "delete-form" = "/admin/picture/{picture}/delete",
 *     "collection" = "/admin/picture",
 *   },
 *   field_ui_base_route = "picture.settings"
 * )
 */
class Picture extends SegallIOFacebookEntityBase implements PictureInterface {

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

    $fields['asset'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Asset'))
      ->setDescription(t('The picture it self.'))
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
      ->setSetting('target_type', 'file');

    $fields['album'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Album'))
      ->setDescription(t('The album which the picture belong to.'))
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
      ->setSetting('target_type', 'album');

    return $fields;
  }

}
