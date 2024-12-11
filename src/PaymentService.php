<?php

namespace App;

interface PaymentService {
  
  public function processPayment(float $quantity);
  
}