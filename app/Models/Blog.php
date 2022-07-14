<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'categories_id',
        'title',
        'slug',
        'content',
        'image'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categories_id');
    }
}
