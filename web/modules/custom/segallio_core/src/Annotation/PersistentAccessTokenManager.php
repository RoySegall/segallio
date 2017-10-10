<?php

namespace Drupal\segallio_core\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Persistent access token manager item annotation object.
 *
 * @see \Drupal\segallio_core\Plugin\PersistentAccessTokenManagerManager
 * @see plugin_api
 *
 * @Annotation
 */
class PersistentAccessTokenManager extends Plugin {


  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

}
