<?php

namespace App\Repositories;

use App\Models\EmojiOperator;

class EmojiOperatorRepository
{
    protected $emoji_operator;

    public function __construct(EmojiOperator $emoji_operator)
    {
        $this->emoji_operator = $emoji_operator;
    }

    public function get_all_operators() : object
    {
        return $this->emoji_operator->get();
    }

    public function get_operator_by_emoji_code(string $emoji_code) : string
    {
        $operator = $this->emoji_operator
                ->where('emoji_code', $emoji_code)
                ->first('arithmetic_operator');
        return !empty($operator) ? $operator->arithmetic_operator : "";
    }

    public function get_operator_by_title(string $title) : string
    {
        $operator = $this->emoji_operator
                ->where('title', $title)
                ->first('arithmetic_operator');
        return !empty($operator) ? $operator->arithmetic_operator : "";
    }

}

