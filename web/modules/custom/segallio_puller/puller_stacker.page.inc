<?php

/**
 * @file
 * Contains puller_stacker.page.inc.
 *
 * Page callback for Puller stacker entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Puller stacker templates.
 *
 * Default template: puller_stacker.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_puller_stacker(array &$variables) {
  // Fetch PullerStacker Entity Object.
  $puller_stacker = $variables['elements']['#puller_stacker'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
