<?php

/**
 * @file
 * Contains status.page.inc.
 *
 * Page callback for Status entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Status templates.
 *
 * Default template: status.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_status(array &$variables) {
  // Fetch Status Entity Object.
  $status = $variables['elements']['#status'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
