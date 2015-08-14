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
   * {@inheritdoc}
   */
  public function getConstraints() {
    $constraint_manager = \Drupal::typedDataManager()->getValidationConstraintManager();
    $constraints = parent::getConstraints();

    $label = $this->getFieldDefinition()->getLabel();

    $min = 0;
    $constraints[] = $constraint_manager->create('ComplexData', array(
      'value' => array(
        'Range' => array(
          'min' => $min,
          'minMessage' => t('%name: the value may be no less than %min.', array('%name' => $label, '%min' => $min)),
        )
      ),
    ));
    $max = 100;
    $constraints[] = $constraint_manager->create('ComplexData', array(
      'value' => array(
        'Range' => array(
          'max' => $max,
          'maxMessage' => t('%name: the value may be no greater than %max.', array('%name' => $label, '%max' => $max)),
        )
      ),
    ));

    return $constraints;
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    if (empty($this->value) && (string) $this->value !== '0') {
      return TRUE;
    }
    return FALSE;
  }

}
