<?php

namespace drupol\phpermutations\Iterators;

use drupol\phpermutations\Combinatorics;

/**
 * Class Rotation.
 *
 * @package drupol\phpermutations\Iterators
 */
class Rotation extends Combinatorics implements \Iterator, \Countable {

  /**
   * The key.
   *
   * @var int
   */
  protected $key = 0;

  /**
   * A copy of the original data.
   *
   * @var mixed[]
   */
  protected $rotation;

  /**
   * Rotation constructor.
   *
   * @param array $dataset
   *   The dataset.
   */
  public function __construct(array $dataset = array()) {
    parent::__construct($dataset, NULL);
    $this->rotation = $this->getDataset();
  }

  /**
   * {@inheritdoc}
   */
  public function key() {
    return $this->key;
  }

  /**
   * {@inheritdoc}
   */
  public function current() {
    return $this->rotation;
  }

  /**
   * Compute the next value of the Iterator.
   *
   * @param int $offset
   *   The offset.
   */
  public function next($offset = 1) {
    $offset = is_null($offset) ? 1 : $offset % $this->count();
    $this->rotation = array_merge(array_slice($this->rotation, $offset), array_slice($this->rotation, 0, $offset));
  }

  /**
   * {@inheritdoc}
   */
  public function rewind() {
    $this->rotation = $this->getDataset();
  }

  /**
   * {@inheritdoc}
   */
  public function valid() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function count() {
    return count($this->getDataset());
  }

}
