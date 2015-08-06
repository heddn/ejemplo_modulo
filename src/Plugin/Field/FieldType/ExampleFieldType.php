<?php

/**
 * @file
 * Contains Drupal\ejemplo\Plugin\Field\FieldType\ExampleFieldType.
 */

namespace Drupal\ejemplo\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;

/**
 * Plugin implementation of the 'Example field type' field type.
 *
 * @FieldType(
 *   id = "Example progress",
 *   label = @Translation("Example Progress"),
 *   description = @Translation("Example progress"),
 *   default_widget = "example_progress",
 *   default_formatter = "example_progress"
 * )
 */
class ExampleFieldType extends FieldItemBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultStorageSettings() {
    return array() + parent::defaultStorageSettings();
  }

  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['value'] = DataDefinition::create('string')
      ->setLabel(t('Decimal value'))
      ->setRequired(TRUE);

    return $properties;
  }

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return array(
      'columns' => array(
        'value' => array(
          'type' => 'int',
          'not null' => FALSE,
        ),
      ),
    );
  }

}
