<?php

namespace Drupal\segallio_core\Form;

use Drupal\Core\Entity\ContentEntityForm;
use Drupal\Core\Form\FormStateInterface;

/**
 * Form controller for Social access tokens edit forms.
 *
 * @ingroup segallio_core
 */
class SocialAccessTokensForm extends ContentEntityForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    /* @var $entity \Drupal\segallio_core\Entity\SocialAccessTokens */
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
        drupal_set_message($this->t('Created the %label Social access tokens.', [
          '%label' => $entity->label(),
        ]));
        break;

      default:
        drupal_set_message($this->t('Saved the %label Social access tokens.', [
          '%label' => $entity->label(),
        ]));
    }
    $form_state->setRedirect('entity.social_access_tokens.canonical', ['social_access_tokens' => $entity->id()]);
  }

}
