<?php

    namespace App\Models\RealEstate;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class RealEstate extends Model
    {
        use HasFactory;

        protected $table = 'real_estate';
        protected $fillable = ['title', 'content', 'excerpt', 'slug', 'image'];

        public function categories()
        {
            return $this->belongsToMany(RealEstateCategory::class, 'cats4realestate', 'real_estate_id', 'category_id');
        }
    }
