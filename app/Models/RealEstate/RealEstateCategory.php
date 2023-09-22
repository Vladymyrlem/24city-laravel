<?php

    namespace App\Models\RealEstate;

    use App\Models\CompanyCategory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class RealEstateCategory extends Model
    {
        use HasFactory;

        protected $table = "real_estate_category";
        protected $fillable = ['id', 'name', 'slug', 'parent_id'];

        public function categories()
        {
            return $this->hasMany(RealEstateCategory::class, 'real_estate_id', 'category_id');
        }

        public function subcategories()
        {
            return $this->hasMany(RealEstateCategory::class, 'parent_id');
        }

        public function real_estate()
        {
            return $this->belongsToMany(RealEstate::class, 'cats4realestate', 'category_id', 'real_estate_id');
        }
    }
