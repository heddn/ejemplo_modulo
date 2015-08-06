<?php

/**
 * @file
 * Contains Drupal\ejemplo\Tests\DefaultController.
 */

namespace Drupal\ejemplo\Tests;

use Drupal\simpletest\WebTestBase;

/**
 * Provides automated tests for the ejemplo module.
 */
class DefaultControllerTest extends WebTestBase {
  /**
   * {@inheritdoc}
   */
  public static function getInfo() {
    return array(
      'name' => "ejemplo DefaultController's controller functionality",
      'description' => 'Test Unit for module ejemplo and controller DefaultController.',
      'group' => 'Other',
    );
  }

  /**
   * {@inheritdoc}
   */
  public function setUp() {
    parent::setUp();
  }

  /**
   * Tests ejemplo functionality.
   */
  public function testDefaultController() {
    // Check that the basic functions of module ejemplo.
    $this->assertEqual(TRUE, TRUE, 'Test Unit Generated via App Console.');
  }

}
