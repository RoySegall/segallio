<?php

/**
 * @file
 * Contains pull_request.page.inc.
 *
 * Page callback for Pull request entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Pull request templates.
 *
 * Default template: pull_request.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_pull_request(array &$variables) {
  // Fetch PullRequest Entity Object.
  $pull_request = $variables['elements']['#pull_request'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
