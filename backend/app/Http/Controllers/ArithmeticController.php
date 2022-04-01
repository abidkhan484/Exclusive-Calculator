<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArithmeticService;

class ArithmeticController extends Controller
{
    protected $arithmetic_service;

    public function __contruct(EmojiOperatorService $arithmetic_service)
    {
        $this->arithmetic_service = $arithmetic_service;
    }

    // $all_operators = $this->arithmetic_service->get_all_operators();

}
