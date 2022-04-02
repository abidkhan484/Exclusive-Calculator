<?php

namespace App\Services\Interfaces;

interface IArithmeticServices
{
    public function make_calculation($data);
    public function make_addition($number1, $number2);
    public function make_subtraction($number1, $number2);
    public function make_multiplication($number1, $number2);
    public function make_division($number1, $number2);
}