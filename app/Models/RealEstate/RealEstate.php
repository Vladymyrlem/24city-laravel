<?php

namespace App\Models\RealEstate;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RealEstate\RealEstateCategory;

class RealEstate extends Model
{
    use HasFactory;

    protected $table = 'real_estate';
    protected $fillable = ['title', 'content', 'excerpt', 'slug', 'image'];

    public function categories()
    {
        return $this->belongsToMany(RealEstateCategory::class, 'cats4realestate', 'real_estate_id', 'real_estate_category_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables');
    }
}
