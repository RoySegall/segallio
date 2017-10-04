<?php

/**
 * @file
 * Contains instagram.page.inc.
 *
 * Page callback for Instagram entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Instagram templates.
 *
 * Default template: instagram.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_instagram(array &$variables) {
  // Fetch Instagram Entity Object.
  $instagram = $variables['elements']['#instagram'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
