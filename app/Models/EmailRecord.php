<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailRecord extends Model
{
    protected $fillable = [
        'type_id', 'admin_id', 'user_id', 'email_title', 'text', 'status',
    ];
}
