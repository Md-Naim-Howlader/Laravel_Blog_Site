<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
     protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'facebook',
        'instagram',
        'twitter',
        'linkedin',
        'copyright'
    ];
    use HasFactory;
}
