<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Subcategory extends Model
{
    use HasFactory;
    // public $timestamps = false; for auto time(created_at, updated_at) add kora, by-default true thake


    /*
    // jodi data insert korar jonno create() method diye kori tahole fillable need

    protected $fillable = [
        'category_id',
        'subcategory_name',
        'subcategory_slug'
    ];
    */

    //__ join with category__//
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
}
