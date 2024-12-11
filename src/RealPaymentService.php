<?php

namespace App;

class RealPaymentService implements PaymentService {

  public function processPayment(float $quantity) {
    echo "Conectar con la pasarela de pago del banco para cobrar $quantity euros";
    return true;
  }
}