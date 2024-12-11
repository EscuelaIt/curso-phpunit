<?php

namespace App;

class TimeCalculator {
  public function convertMinutesToHoursAndMinutes(int $minutes): array {
    $hours = intdiv($minutes, 60);
    $remainingMinutes = $minutes % 60;
    return [$hours, $remainingMinutes]; 
  }
}