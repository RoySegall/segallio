<?php

namespace Drupal\segallio_core\Entity;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Entity\EntityChangedTrait;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\user\UserInterface;

/**
 * Defines the Social access tokens entity.
 *
 * @ingroup segallio_core
 *
 * @ContentEntityType(
 *   id = "social_access_tokens",
 *   label = @Translation("Social access tokens"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\segallio_core\SocialAccessTokensListBuilder",
 *     "views_data" = "Drupal\segallio_core\Entity\SocialAccessTokensViewsData",
 *
 *     "form" = {
 *       "default" = "Drupal\segallio_core\Form\SocialAccessTokensForm",
 *       "add" = "Drupal\segallio_core\Form\SocialAccessTokensForm",
 *       "edit" = "Drupal\segallio_core\Form\SocialAccessTokensForm",
 *       "delete" = "Drupal\segallio_core\Form\SocialAccessTokensDeleteForm",
 *     },
 *     "access" = "Drupal\segallio_core\SocialAccessTokensAccessControlHandler",
 *     "route_provider" = {
 *       "html" = "Drupal\segallio_core\SocialAccessTokensHtmlRouteProvider",
 *     },
 *   },
 *   base_table = "social_access_tokens",
 *   admin_permission = "administer social access tokens entities",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "name",
 *     "uuid" = "uuid",
 *     "uid" = "user_id",
 *     "langcode" = "langcode",
 *     "status" = "status",
 *   },
 *   links = {
 *     "canonical" = "/admin/content/social_access_tokens/{social_access_tokens}",
 *     "add-form" = "/admin/content/social_access_tokens/add",
 *     "edit-form" = "/admin/content/social_access_tokens/{social_access_tokens}/edit",
 *     "delete-form" = "/admin/content/social_access_tokens/{social_access_tokens}/delete",
 *     "collection" = "/admin/content/social_access_tokens",
 *   },
 *   field_ui_base_route = "social_access_tokens.settings"
 * )
 */
class SocialAccessTokens extends ContentEntityBase implements SocialAccessTokensInterface {

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
      ->setDescription(t('The user ID of author of the Social access tokens entity.'))
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

    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('Name'))
      ->setDescription(t('The name of the Social access tokens entity.'))
      ->setSettings([
        'max_length' => 50,
        'text_processing' => 0,
      ])
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

    $fields['access_token'] = BaseFieldDefinition::create('json')
      ->setLabel(t('Access token'))
      ->setDescription(t('Tje access token object.'))
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
      ->setCardinality(1);

    return $fields;
  }

}
