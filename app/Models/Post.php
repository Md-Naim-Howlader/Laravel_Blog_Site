<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category, Subcategory, User};

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
    'subcategory_id', 'category_id', 'user_id', 'title', 'slug', 'author',
    'description', 'post_date', 'tags', 'status', 'image'
];


 //__ join with category__//
    public function category()
    {
        return $this->belongsTo(Category::class, "category_id");
    }
 //__ join with subcategory__//
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, "subcategory_id");
    }
 //__ join with user __//
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
}
