<?php

namespace App;

class NotificationService {

  public function sendEmail($data) {
    echo "Envío un email a {$data['to']} con el contenido {$data['content']}";
  }
  
}