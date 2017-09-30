<?php

/**
 * @file
 * Contains tweet.page.inc.
 *
 * Page callback for Tweet entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Tweet templates.
 *
 * Default template: tweet.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_tweet(array &$variables) {
  // Fetch Tweet Entity Object.
  $tweet = $variables['elements']['#tweet'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
