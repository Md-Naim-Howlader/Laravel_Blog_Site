<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Category extends Model
{
    use HasFactory;

      protected $fillable = [
        'category_name',
        'slug'
    ];
    /*
    //__example of mutetor old syntax__//
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);

    }
     */

    //__example of mutetor new syntax
    protected function name(): Attribute // upore imported
    {
    return Attribute::make(
        set: fn($value) => ucwords($value) // Mutator: প্রতিটি শব্দের প্রথম অক্ষর ক্যাপিটাল হবে
    );
}
}
