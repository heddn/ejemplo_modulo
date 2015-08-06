<?php

/**
 * @file
 * Contains Drupal\ejemplo\Plugin\Field\FieldFormatter\ExampleFormatterType.
 */

namespace Drupal\ejemplo\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'example_progress' formatter.
 *
 * @FieldFormatter(
 *   id = "example_progress",
 *   label = @Translation("Example progress formatter") * )
 */
class ExampleFormatterType extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return array(
      'maximum' => 100,
    ) + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $elements = array();

    $elements['maximum'] = array(
      '#type' => 'textfield',
      '#title' => t('Maximum'),
      '#default_value' => $this->getFieldSetting('maximum'),
      '#size' => 4,
      '#maxlength' => 6,
      '#required' => TRUE,
    );

    return $elements;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $arguments = array(
      '%maximum' => $this->getFieldSetting('maximum'),
    );
    $summary = array(
      '#markup' => $this->t('Minimum %minimum & maximum: %maximum', $arguments),
    );

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items) {
    $elements = array();

    foreach ($items as $delta => $item) {
      $elements[$delta] = array('#markup' => $item->value);
    }

    return $elements;
  }

}
