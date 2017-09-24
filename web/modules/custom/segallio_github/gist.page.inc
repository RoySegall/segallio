<?php

/**
 * @file
 * Contains gist.page.inc.
 *
 * Page callback for Gist entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Gist templates.
 *
 * Default template: gist.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_gist(array &$variables) {
  // Fetch Gist Entity Object.
  $gist = $variables['elements']['#gist'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
