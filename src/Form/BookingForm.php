<?php
namespace Drupal\cab_booking\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
* Implements a simple form.
*/
class BookingForm extends FormBase {

  /**
  * Build the simple form.
  *
  * @param array $form
  *   Default form array structure.
  * @param FormStateInterface $form_state
  *   Object containing current form state.
  */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['cb_firstname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('First Name'),
      '#description' => $this->t('Title must be at least 15 characters in length.'),
      '#required' => TRUE,
    ];

    $form['cb_lastname'] = [
        '#type' => 'textfield',
        '#title' => $this->t('Last Name'),
        '#description' => $this->t('Title must be at least 15 characters in length.'),
        '#required' => TRUE,
      ];

      $form['cb_email'] = array(
        '#type' => 'email',
        '#title' => t('Email ID:'),
        '#required' => TRUE,
      );
      $form['cb_number'] = array (
        '#type' => 'tel',
        '#title' => t('Mobile no'),
      );

    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
  * Getter method for Form ID.
  *
  * The form ID is used in implementations of hook_form_alter() to allow other
  * modules to alter the render array built by this form controller.  it must
  * be unique site wide. It normally starts with the providing module's name.
  *
  * @return string
  *   The unique ID of the form defined by this class.
  */
  public function getFormId() {
    return 'booking_form';
  }

  /**
  * Implements form validation.
  *
  * The validateForm method is the default method called to validate input on
  * a form.
  *
  * @param array $form
  *   The render array of the currently built form.
  * @param FormStateInterface $form_state
  *   Object describing the current state of the form.
  */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('cb_firstname');
    if (strlen($title) < 15) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('First Name', $this->t('The title must be at least 15 characters long.'));
    }
  }

  /**
  * Implements a form submit handler.
  *
  * The submitForm method is the default method called for any submit elements.
  *
  * @param array $form
  *   The render array of the currently built form.
  * @param FormStateInterface $form_state
  *   Object describing the current state of the form.
  */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    /*
    * This would normally be replaced by code that actually does something
    * with the title.
    */
    $title = $form_state->getValue('cb_firstname');
    drupal_set_message($this->t('You specified a title of %title.', ['%title' => $title]));
  }

}