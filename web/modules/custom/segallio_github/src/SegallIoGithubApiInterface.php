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
   * Get list of projects.
   *
   * @return array
   *   Get projects.
   */
  public function getProjects();

  /**
   * Get list of commits.
   *
   * @return array
   *   Array of commits.
   */
  public function getCommits();

}
