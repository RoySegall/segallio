<?php

namespace Drupal\segallio_facebook;

/**
 * Interface SegallIOFaecebookGraphInterface.
 */
interface SegallIOFaecebookGraphInterface {

  /**
   * Return a graph object for the request.
   *
   * @param $fields
   *   Lists of fields to pull from.
   *
   * @return \Facebook\GraphNodes\GraphEdge
   */
  public function getFields($fields);

  /**
   * Array of posts.
   *
   * @return array
   */
  public function getPosts();

}
