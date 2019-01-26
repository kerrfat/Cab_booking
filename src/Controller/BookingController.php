<?php

namespace Drupal\cab_booking\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Defines BookingController class.
 */
class BookingController extends ControllerBase {

  /**
   * 
   *
   * @return array
   *   Return markup array.
   */
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('<h1>Cab Booking Page </h1>'),
    ];
  }

}