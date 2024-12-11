<?php

namespace App;

use Exception;

class ShoppingCart {

  private $products = [];
  private $paymentService;
  private $notificationService;
  private $paid = false;

  public function __construct(PaymentService $paymentService, NotificationService $notificationService) {
    $this->paymentService = $paymentService;
    $this->notificationService = $notificationService;
  }

  public function hasProducts() {
    return count($this->products) > 0;
  }

  public function addProduct(Product $product) {
    $this->products[] = $product;
  }

  public function getProducts(): array {
    return $this->products;
  }

  public function removeProduct($product) {
    $index = array_search($product, $this->products, true);
    if($index === false) {
      throw new Exception('El producto no está en el carrito');
    }
    unset($this->products[$index]);
  }

  public function getPriceSummatory() {
    $total = 0;
    foreach($this->products as $product) {
      $total += $product->getPrice();
    }
    return $total;
  }

  public function checkout() {
    if($this->paymentService->processPayment($this->getPriceSummatory())) {
      $this->paid = true;
      $this->notificationService->sendEmail('admin@example.com', 'Se ha completado el pago de un nuevo pedido');
    }
  }

  public function isPaid() {
    return $this->paid;
  }
}