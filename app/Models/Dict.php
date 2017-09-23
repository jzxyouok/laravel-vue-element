<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dict extends Model
{
    public static function getDictByTextEn($textEn)
    {
        return Dict::where('text_en', $textEn)->first();
    }
}
