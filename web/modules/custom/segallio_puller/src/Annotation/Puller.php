<?php

namespace Drupal\segallio_puller\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Puller item annotation object.
 *
 * @see \Drupal\segallio_puller\Plugin\PullerManager
 * @see plugin_api
 *
 * @Annotation
 */
class Puller extends Plugin {

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

  /**
   * The entity type the plugin handles.
   *
   * @var string
   */
  public $entity_type;

}
