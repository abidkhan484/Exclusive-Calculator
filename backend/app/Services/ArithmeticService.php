<?php

namespace App\Services;

use App\Repositories\EmojiOperatorRepository;
use Illuminate\Support\Facades\Log;


class ArithmeticService
{
    protected $emoji_operator_repository;

    public function __construct(EmojiOperatorRepository $emoji_operator_repository)
    {
        $this->emoji_operator_repository = $emoji_operator_repository;
    }

    public function get_all_operators() : object
    {
        return $this->emoji_operator_repository->get_all_operators();
    }

    public function get_arithmetic_result($data)
    {
        ["number1" => $number1, "number2" => $number2, "emoji_code" => $emoji_code] = $data;
        $arithmetic_operator = $this->emoji_operator_repository
                                    ->get_operator_by_emoji_code($emoji_code);

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
