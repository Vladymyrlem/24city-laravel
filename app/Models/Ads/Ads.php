<?php

namespace App\Models\Ads;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ads\AdsCategory;

class Ads extends Model
{
    use HasFactory;

    protected $table = "ads";
    protected $fillable = ['id', 'title', 'content', 'excerpt', 'image', 'slug'];

    public function categories()
    {
        return $this->belongsToMany(AdsCategory::class, 'categories4ads');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }
}
