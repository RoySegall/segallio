<?php

/**
 * @file
 * Contains social_access_tokens.page.inc.
 *
 * Page callback for Social access tokens entities.
 */

use Drupal\Core\Render\Element;

/**
 * Prepares variables for Social access tokens templates.
 *
 * Default template: social_access_tokens.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - elements: An associative array containing the user information and any
 *   - attributes: HTML attributes for the containing element.
 */
function template_preprocess_social_access_tokens(array &$variables) {
  // Fetch SocialAccessTokens Entity Object.
  $social_access_tokens = $variables['elements']['#social_access_tokens'];

  // Helpful $content variable for templates.
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}
