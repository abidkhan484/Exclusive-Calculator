<?php

namespace App\Services;

use App\Repositories\EmojiOperatorRepository;


class ArithmeticService
{
    protected $emoji_operator_repository;

    public function __contruct(EmojiOperatorRepository $emoji_operator_repository)
    {
        $this->emoji_operator_repository = $emoji_operator_repository;
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
        if (! $number2) {
            // can not divided by 0
        }
        return $number1 / $number2;
    }

}
