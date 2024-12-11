<?php

namespace App;

class ReadTimeCalculator {
  private $text;
  private $wordsPerMinute;

  public function __construct(string $text, int $wordsPerMinute = 200) {
      $this->text = $text;
      $this->wordsPerMinute = $wordsPerMinute;
  }

  public function getReadTimeInMinutes() : int {
    $wordCount = str_word_count($this->text);
    return (int) ceil($wordCount / $this->wordsPerMinute);
  }
  
  public function getReadTimeInHours(): string {
      $minutes = $this->getReadTimeInMinutes();
      $timeCalculator = new TimeCalculator();
      [$hours, $minutes] = $timeCalculator->convertMinutesToHoursAndMinutes($minutes);
      return sprintf('%d:%02d', $hours, $minutes); // Formato h:mm
  }
    
}