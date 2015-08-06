<?php

/**
 * @file
 * Contains Drupal\ejemplo\Controller\DefaultController.
 */

namespace Drupal\ejemplo\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class DefaultController.
 *
 * @package Drupal\ejemplo\Controller
 */
class DefaultController extends ControllerBase {
  /**
   * Hola.
   *
   * @return string
   *   Return Hola string.
   */
  public function hola($name) {
    return [
        '#type' => 'markup',
        '#markup' => $this->t('Hola @name!', ['@name' => $name])
    ];
  }

}
