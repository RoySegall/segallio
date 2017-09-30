<?php

/**
 * @file
 * Contains picture.page.inc.
 *
 * Page callback for Picture entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Picture templates.
 *
 * Default template: picture.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_picture(array &$variables) {
  // Fetch Picture Entity Object.
  $picture = $variables['elements']['#picture'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
