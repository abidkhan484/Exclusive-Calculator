<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmojiOperator extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'emoji_code', 'arithmetic_operator'];
}
