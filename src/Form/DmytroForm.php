<?php

namespace Drupal\dmytro\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DmytroForm.
 */
class DmytroForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'dmytro_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['test_javascript_form_validation'] = [
      '#type' => 'label',
      '#title' => $this->t('Test JavaScript Form Validation'),
      '#description' => $this->t('Title_of_Custom_Form'),
      '#weight' => '0',
    ];
    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name'),
      '#description' => $this->t('User_Name'),
      '#maxlength' => 64,
      '#size' => 32,
      '#weight' => '1',
    ];
    $form['address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address'),
      '#maxlength' => 128,
      '#size' => 32,
      '#weight' => '2',
    ];
    $form['zip_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Zip Code'),
      '#maxlength' => 64,
      '#size' => 32,
      '#weight' => '3',
    ];
    $form['country'] = [
      '#type' => 'select',
      '#title' => $this->t('Country'),
      '#options' => ['Ukraine' => $this->t('Ukraine'), 'Russia' => $this->t('Russia'), 'USA' => $this->t('USA'), 'England' => $this->t('England'), 'Another' => $this->t('Another')],
      '#size' => 5,
      '#default_value' => '4',
      '#weight' => '4',
    ];
    $form['gender'] = [
      '#type' => 'radios',
      '#title' => $this->t('Gender'),
      '#options' => ['Male' => $this->t('Male'), 'Female' => $this->t('Female')],
      '#weight' => '5',
    ];
    $form['preferences'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Preferences'),
      '#options' => ['Red' => $this->t('Red'), 'Green' => $this->t('Green'), 'Blue' => $this->t('Blue')],
      '#weight' => '6',
    ];
    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
      '#weight' => '7',
    ];
    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#weight' => '8',
    ];

    $form['verify_password'] = [
      '#type' => 'password_confirm',
      '#title' => $this->t('Verify password'),
      '#maxlength' => 64,
      '#size' => 32,
      '#weight' => '10',
    ];


    $form['reset'] = array(
      '#type' => 'button',
      '#button_type' => 'reset',
      '#value' => t('Clear'),
      '#weight' => 11,
      '#validate' => array(),
      '#attributes' => array(
        'onclick' => 'this.form.reset(); return false;',
      ),
    );

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
      '#weight' => '11',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    foreach ($form_state->getValues() as $key => $value) {
      // @TODO: Validate fields.
    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
