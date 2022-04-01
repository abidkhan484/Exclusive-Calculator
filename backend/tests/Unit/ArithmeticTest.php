<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\ArithmeticService;

class ArithmeticTest extends TestCase
{
    protected $arithmetic_service;

    public function setUp() : void
    {
        parent::setUp();
        $this->arithmetic_service = resolve('App\Services\ArithmeticService');        
    }

    public function test_addition_in_arithmetic_operations()
    {
        [$number1, $number2, $actual] = [1, 2, 3];
        $expected = $this->arithmetic_service->make_addition($number1, $number2);
        $this->assertEquals(
            $expected,
            $actual,
            "Summation result is not equals as expected"
        );
    }

    public function test_subtraction_in_arithmetic_operations()
    {
        [$number1, $number2, $actual] = [3, 1, 2];
        $expected = $this->arithmetic_service->make_subtraction($number1, $number2);
        $this->assertEquals(
            $expected,
            $actual,
            "Subtraction result is not equals as expected"
        );
    }

    public function test_multiplication_in_arithmetic_operations()
    {
        [$number1, $number2, $actual] = [3, 2, 6];
        $expected = $this->arithmetic_service->make_multiplication($number1, $number2);
        $this->assertEquals(
            $expected,
            $actual,
            "Multiplication result is not equals as expected"
        );
    }

    public function test_division_in_arithmetic_operations()
    {
        [$number1, $number2, $actual] = [6, 2, 3];
        $expected = $this->arithmetic_service->make_division($number1, $number2);
        $this->assertEquals(
            $expected,
            $actual,
            "Division result is not equals as expected"
        );
    }
}
