<?php

namespace Drupal\segallio_github\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Gist entity.
 *
 * @ingroup segallio_github
 *
 * @ContentEntityType(
 *   id = "gist",
 *   label = @Translation("Gist"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\segallio_github\GistListBuilder",
 *     "views_data" = "Drupal\segallio_github\Entity\GistViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\segallio_github\Form\GistForm",
 *       "add" = "Drupal\segallio_github\Form\GistForm",
 *       "edit" = "Drupal\segallio_github\Form\GistForm",
 *       "delete" = "Drupal\segallio_github\Form\GistDeleteForm",
 *     },
 *     "access" = "Drupal\segallio_github\GistAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\segallio_github\GistHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "gist",
 *   admin_permission = "administer gist entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "url",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/gist/{gist}",
 *     "add-form" = "/admin/content/gist/add",
 *     "edit-form" = "/admin/content/gist/{gist}/edit",
 *     "delete-form" = "/admin/content/gist/{gist}/delete",
 *     "collection" = "/admin/content/gist",
 *   },
 *   field_ui_base_route = "gist.settings"
 * )
 */
class Gist extends ContentEntityBase implements GistInterface {

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

    $fields['user_id'] = BaseFieldDefinition::create('entity_reference')
      ->setLabel(t('Authored by'))
      ->setDescription(t('The user ID of author of the Gist entity.'))
      ->setRevisionable(TRUE)
      ->setSetting('target_type', 'user')
      ->setSetting('handler', 'default')
      ->setTranslatable(TRUE)
      ->setDisplayOptions('view', [
        'label' => 'hidden',
        'type' => 'author',
        'weight' => 0,
      ])
      ->setDisplayOptions('form', [
        'type' => 'entity_reference_autocomplete',
        'weight' => 5,
        'settings' => [
          'match_operator' => 'CONTAINS',
          'size' => '60',
          'autocomplete_type' => 'tags',
          'placeholder' => '',
        ],
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['url'] = BaseFieldDefinition::create('string')
      ->setRequired(TRUE)
      ->setLabel(t('URL'))
      ->setDescription(t('The URL of the gist.'))
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'string_textfield',
        'weight' => -4,
      ])
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['updated_at'] = BaseFieldDefinition::create('datetime')
      ->setLabel(t('Updated at'))
      ->setDescription(t('When was the repo last updated.'))
      ->setDefaultValue('')
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'string',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'datetime_default',
        'weight' => 2,
      ])
      ->setRequired(TRUE)
      ->setDisplayConfigurable('form', TRUE)
      ->setDisplayConfigurable('view', TRUE);

    $fields['status'] = BaseFieldDefinition::create('boolean')
      ->setLabel(t('Publishing status'))
      ->setDescription(t('A boolean indicating whether the Gist is published.'))
      ->setDisplayOptions('form', [
        'type' => 'boolean',
        'weight' => 1,
      ])
      ->setDefaultValue(TRUE);

    $fields['files'] = BaseFieldDefinition::create('json')
      ->setLabel(t('Files'))
      ->setDescription(t('List of files.'))
      ->setDisplayOptions('view', [
        'label' => 'above',
        'type' => 'json',
        'weight' => -4,
      ])
      ->setDisplayOptions('form', [
        'type' => 'json_textarea',
        'weight' => 1,
      ])
      ->setRequired(TRUE)
      ->setCardinality(FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED);

    $fields['created'] = BaseFieldDefinition::create('created')
      ->setLabel(t('Created'))
      ->setDescription(t('The time that the entity was created.'));

    $fields['changed'] = BaseFieldDefinition::create('changed')
      ->setLabel(t('Changed'))
      ->setDescription(t('The time that the entity was last edited.'));


    return $fields;
  }

}
