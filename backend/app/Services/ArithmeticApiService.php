<?php

namespace App\Services;

use App\Repositories\EmojiOperatorRepository;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\IArithmeticServices;


class ArithmeticApiService
{
    protected $emoji_operator_repository;
    protected $arithmetic_services;

    public function __construct(EmojiOperatorRepository $emoji_operator_repository, IArithmeticServices $arithmetic_services)
    {
        $this->emoji_operator_repository = $emoji_operator_repository;
        $this->arithmetic_services = $emoji_operator_repository;
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
        if (empty($arithmetic_operator)) {
            return "Arithmetic operator not found";
        }

        unset($data['emoji_code']);
        $data['arithmetic_operator'] = $arithmetic_operator;
        return $this->arithmetic_services->make_calculation($data);

    }

}
