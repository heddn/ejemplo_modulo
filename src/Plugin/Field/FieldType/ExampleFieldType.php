<?php

/**
 * @file
 * Contains Drupal\ejemplo\Plugin\Field\FieldType\ExampleFieldType.
 */

namespace Drupal\ejemplo\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;
use Drupal\Core\StringTranslation\TranslationWrapper;

/**
 * Plugin implementation of the 'Example field type' field type.
 *
 * @FieldType(
 *   id = "example_progress",
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
      ->setLabel(new TranslationWrapper('Text value'))
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

  /**
   * Implements \Drupal\Core\TypedData\ComplexDataInterface::isEmpty().
   */
  public function isEmpty() {
    foreach ($this->properties as $property) {
      $definition = $property->getDataDefinition();
      if (!$definition->isComputed() && $property->getValue() !== NULL) {
        return FALSE;
      }
    }
    if (isset($this->values)) {
      foreach ($this->values as $name => $value) {
        if (!empty($value) && !isset($this->properties[$name])) {
          return FALSE;
        }
      }
    }
    return TRUE;
  }

}
