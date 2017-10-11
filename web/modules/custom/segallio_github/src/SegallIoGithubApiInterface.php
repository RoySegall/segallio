<?php

namespace Drupal\segallio_github;

/**
 * Interface SegallIoGithubApiInterface
 */
interface SegallIoGithubApiInterface {

  /**
   * Get list of gists.
   *
   * @return array
   *   List of gists.
   */
  public function getGists();

  /**
   * Get list of events.
   *
   * @return array
   *   Array of commits.
   */
  public function getEvents();

}
