<?php

namespace App\Models\News;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsCategory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "news_categories";
    protected $fillable = ['id', 'name', 'slug', 'parent_id'];
    protected $connection = 'testing';

    public function categories()
    {
        return $this->belongsToMany(NewsCategory::class, 'cats4news', 'news_id', 'category_id');
    }

    public function news()
    {
        return $this->belongsToMany(News::class, 'cats4news', 'category_id');
    }
}
