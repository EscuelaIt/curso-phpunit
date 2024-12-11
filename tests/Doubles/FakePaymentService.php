<?php

namespace Tests\Doubles;

use App\PaymentService;

class FakePaymentService implements PaymentService {

  public function processPayment(float $quantity) {
    return true;
  }

}