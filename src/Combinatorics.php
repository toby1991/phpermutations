<?php

namespace drupol\phpermutations;

/**
 * Class Combinatorics.
 *
 * @package drupol\phpermutations
 */
abstract class Combinatorics implements \Countable {

  /**
   * The dataset.
   *
   * @var array
   */
  protected $dataset;

  /**
   * The number of values in the dataset.
   *
   * @var int
   */
  protected $datasetCount;

  /**
   * The length.
   *
   * @var int
   */
  protected $length;

  /**
   * Combinatorics constructor.
   *
   * @param array $dataset
   *   The dataset.
   * @param int|null $length
   *   The length.
   */
  public function __construct(array $dataset = array(), $length = NULL) {
    $this->setDataset($dataset);
    $this->datasetCount = count($this->dataset);
    $this->setLength($length);
  }

  /**
   * Set the length.
   *
   * @param int $length
   *   The length.
   *
   * @return $this
   */
  public function setLength($length = NULL) {
    $length = is_null($length) ? $this->datasetCount : $length;
    $this->length = ($length > $this->datasetCount) ? $this->datasetCount : $length;

    return $this;
  }

  /**
   * Get the length.
   *
   * @return int
   *   The length.
   */
  public function getLength() {
    return (int) $this->length;
  }

  /**
   * Set the dataset.
   *
   * @param array $dataset
   *   The dataset.
   *
   * @return $this
   */
  public function setDataset(array $dataset = array()) {
    $this->dataset = $dataset;

    return $this;
  }

  /**
   * Get the dataset.
   *
   * @return mixed[]
   *   The dataset.
   */
  public function getDataset() {
    return $this->dataset;
  }

  /**
   * Compute the factorial of an integer.
   *
   * @param int $n
   *   The number to get its factorial.
   * @param int $total
   *   The total.
   *
   * @return int
   *   The factorial of $n.
   */
  protected function fact($n, $total = 1) {
    return ($n < 2) ? $total : $this->fact($n - 1, $total * $n);
  }

}
