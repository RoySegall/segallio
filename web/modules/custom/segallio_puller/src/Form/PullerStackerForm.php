<?php

namespace Drupal\segallio_puller\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Puller stacker edit forms.
 *
 * @ingroup segallio_puller
 */
class PullerStackerForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\segallio_puller\Entity\PullerStacker */
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
        drupal_set_message($this->t('Created the %label Puller stacker.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Puller stacker.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.puller_stacker.canonical', ['puller_stacker' => $entity->id()]);
  }

}
