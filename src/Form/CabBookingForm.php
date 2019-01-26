<?php

namespace Drupal\cab_booking\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class CabBookingForm.
 */
class CabBookingForm extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cab_booking_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['first_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('First Name'),
      '#maxlength' => 25,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['last_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Last Name'),
      '#description' => $this->t('Last Name'),
      '#maxlength' => 25,
      '#size' => 64,
      '#weight' => '0',
    ];

    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone Number'),
      '#description' => $this->t('Phone Number'),
      '#weight' => '0',
    ];
    $form['address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address'),
      '#description' => $this->t('Your Address'),
      '#maxlength' => 100,
      '#size' => 100,
      '#weight' => '0',
    ];

    $form['distinationaddress'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Distination Address'),
      '#description' => $this->t('Your Distination Address'),
      '#maxlength' => 100,
      '#size' => 100,
      '#weight' => '0',
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('E-mail'),
      '#weight' => '0',
    ];

    $form['confirmemail'] = [
      '#type' => 'email',
      '#title' => $this->t('Confirm E-mail'),
      '#weight' => '0',
    ];

    $form['distance'] = [
      '#type' => 'number',
      '#title' => $this->t('Distance'),
      '#weight' => '0',
    ];
 
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Send'),
    ];
    $form['#theme'] = 'your_form_theme';
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
