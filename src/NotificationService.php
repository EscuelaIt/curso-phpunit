<?php

namespace App;

class NotificationService {

  public function sendEmail($to, $content) {
    echo "Envío un email a $to con el contenido $content";
  }
  
}