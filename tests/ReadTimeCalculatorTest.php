<?php

namespace Tests;

use App\ReadTimeCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ReadTimeCalculatorTest extends TestCase {

  public static function provideTextAndExpectedMinutes() {
    return [
      ['hola', 200, 1],
      [str_repeat('word ', 220), 200, 2],
      [str_repeat('word ', 1420), 200, 8],
      [str_repeat('word ', 1000), 100, 10],
    ];
  }

  #[DataProvider('provideTextAndExpectedMinutes')]
  public function testReadTimeInMinutes($text, $wordsPerMinute, $expectedMinutes) {
    $readTimeCalculator = new ReadTimeCalculator($text, $wordsPerMinute);
    $minutes = $readTimeCalculator->getReadTimeInMinutes();
    $this->assertEquals($expectedMinutes, $minutes);
  }


  // public function testReadTimeInMinutesOfOneWord() {
  //   $readTimeCalculator = new ReadTimeCalculator('hola');
  //   $minutes = $readTimeCalculator->getReadTimeInMinutes();
  //   $this->assertEquals(1, $minutes);
  // }

  // public function testReadTimeInMinutesOf220Words() {
  //   $readTimeCalculator = new ReadTimeCalculator(str_repeat('word ', 220));
  //   $minutes = $readTimeCalculator->getReadTimeInMinutes();
  //   $this->assertEquals(2, $minutes);
  // }

  // public function testReadTimeInMinutesOf1420Words() {
  //   $readTimeCalculator = new ReadTimeCalculator(str_repeat('word ', 1420));
  //   $minutes = $readTimeCalculator->getReadTimeInMinutes();
  //   $this->assertEquals(8, $minutes);
  // }

  public static function provideTextAndExpectedHours(): array {
    return [
      '220 words, default speed' => [str_repeat("word ", 220), 200, '0:02'],
      '600 words, default speed' => [str_repeat("word ", 600), 200, '0:03'],
      '50000 words, default speed'  => [str_repeat("word ", 50000), 200, '4:10'],
      '600 words, custom speed'  => [str_repeat("word ", 600), 300, '0:02'],
    ];
  }

  #[DataProvider('provideTextAndExpectedHours')]
  public function testReadTimeInHours(string $text, int $wordsPerMinute, string $expectedHours) {
    $calculator = new ReadTimeCalculator($text, $wordsPerMinute);
    $this->assertEquals($expectedHours, $calculator->getReadTimeInHours());
  }
}