<?php

namespace Drupal\segallio_facebook\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Album entity.
 *
 * @ingroup segallio_facebook
 *
 * @ContentEntityType(
 *   id = "album",
 *   label = @Translation("Album"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\segallio_facebook\AlbumListBuilder",
 *     "views_data" = "Drupal\segallio_facebook\Entity\AlbumViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\segallio_facebook\Form\AlbumForm",
 *       "add" = "Drupal\segallio_facebook\Form\AlbumForm",
 *       "edit" = "Drupal\segallio_facebook\Form\AlbumForm",
 *       "delete" = "Drupal\segallio_facebook\Form\AlbumDeleteForm",
 *     },
 *     "access" = "Drupal\segallio_facebook\AlbumAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\segallio_facebook\AlbumHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "album",
 *   admin_permission = "administer album entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/album/{album}",
 *     "add-form" = "/admin/content/album/add",
 *     "edit-form" = "/admin/content/album/{album}/edit",
 *     "delete-form" = "/admin/content/album/{album}/delete",
 *     "collection" = "/admin/content/album",
 *   },
 *   field_ui_base_route = "album.settings"
 * )
 */
class Album extends SegallIOFacebookEntityBase implements AlbumInterface {

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

    $fields['pictures'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Pictures'))
      ->setDescription(t('All the pictures of the album.'))
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
      ->setSetting('target_type', 'picture');

    return $fields;
  }

}
