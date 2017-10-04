<?php

namespace Drupal\segallio_instagram\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Instagram edit forms.
 *
 * @ingroup segallio_instagram
 */
class InstagramForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\segallio_instagram\Entity\Instagram */
    $form = parent::buildForm($form, $form_state);

    $entity = $this->entity;

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $entity = &$this->entity;

    $status = parent::save($form, $form_state);

    switch ($status) {
      case SAVED_NEW:
        drupal_set_message($this->t('Created the %label Instagram.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Instagram.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.instagram.canonical', ['instagram' => $entity->id()]);
  }

}
