<?php

/**
 * @file
 * Contains album.page.inc.
 *
 * Page callback for Album entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Album templates.
 *
 * Default template: album.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_album(array &$variables) {
  // Fetch Album Entity Object.
  $album = $variables['elements']['#album'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
