<?php

namespace Drupal\di_examples\Services\Interfaces;

/**
 * Logger service interface definition.
 *
 * @version 1.0.0
 */
interface LoggerServiceInterface {

  /**
   * Log something.
   *
   * @param string $something
   *   The user entity.
   */
  public function logSomething($something);

}
