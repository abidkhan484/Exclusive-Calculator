<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\IArithmeticServices;


class ArithmeticService implements IArithmeticServices
{
    public function make_calculation($data)
    {
        ["number1" => $number1, "number2" => $number2, "arithmetic_operator" => $arithmetic_operator] = $data;
        $result = "";
        switch ($arithmetic_operator) {
            case '+':
                $result = $this->make_addition($number1, $number2);
                break;
            case '-':
                $result = $this->make_subtraction($number1, $number2);
                break;
            case '*':
                $result = $this->make_multiplication($number1, $number2);
                break;
            case '/':
                $result = ($number2 != 0) 
                            ? $this->make_division($number1, $number2) 
                            : "Tried to divide by zero!!";
                break;
            default:
                $result = "Arithmetic operator not found";
                break;
        }
        return $result;
    }

    public function make_addition($number1, $number2)
    {
        return $number1 + $number2;
    }

    public function make_subtraction($number1, $number2)
    {
        return $number1 - $number2;
    }

    public function make_multiplication($number1, $number2)
    {
        return $number1 * $number2;
    }

    public function make_division($number1, $number2)
    {
        $result;
        try {
            $result = $number1 / $number2;
        } catch (DivisionByZeroError $e) {
            $message = "Caught DivisionByZeroError! {$e}";
            Log::critical($message);
        }
        return $result;
    }
}