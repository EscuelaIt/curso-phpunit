<?php

namespace Tests;

use App\TimeCalculator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\Attributes\DataProvider;

class TimeCalculatorTest extends TestCase {
  
  protected $timeCalculator;

  protected function setUp() : void {
    $this->timeCalculator = new TimeCalculator();
  }

  public static function minutesToHoursAndMinutesProvider() : array {
    return [
      '60 minutes to one hour' => [60, 1, 0],
      '30 minutes to 30 minutes' => [30, 0, 30],
      '0 minutes to 0 minutes 0 hours' => [0, 0, 0],
      '365 minutes to 5 minutes 6 hours' => [365, 6, 5],
    ];
  }

  #[Test]
  #[DataProvider('minutesToHoursAndMinutesProvider')]
  public function convert60MinutesInOneHour($minutes, $expectedHours, $expectedMinutes) {
    [$returnedHours, $returnedMinutes] = $this->timeCalculator->convertMinutesToHoursAndMinutes($minutes);
    $this->assertEquals($expectedHours, $returnedHours);
    $this->assertEquals($expectedMinutes, $returnedMinutes);
  }

  #[Test]
  public function convertMinutesToHoursAndMinutesReturnsAnArray() {
    $result = $this->timeCalculator->convertMinutesToHoursAndMinutes(60);
    $this->assertIsArray($result);
  }


}