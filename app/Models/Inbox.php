<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $fillable = [
        'full_name',
        'email',
        'subject',
        'message',
        'photo',
        'status',
    ];
    use HasFactory;
}
