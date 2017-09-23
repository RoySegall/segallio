<?php

/**
 * @file
 * Contains repository.page.inc.
 *
 * Page callback for Repository entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Repository templates.
 *
 * Default template: repository.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_repository(array &$variables) {
  // Fetch Repository Entity Object.
  $repository = $variables['elements']['#repository'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
