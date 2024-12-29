<?php

    namespace App\Models\Ads;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class AdsCategory extends Model
    {
        use HasFactory;

        protected $table = "ads_categories";
        protected $fillable = ['id', 'name', 'slug', 'parent_id'];


        public function categories()
        {
            return $this->belongsToMany(AdsCategory::class, 'ads_categories', 'id');
        }
        public function parentCategory()
        {
            return $this->belongsTo(AdsCategory::class, 'parent_id');
        }
        public function subcategories()
        {
            return $this->hasMany(AdsCategory::class, 'parent_id');
        }
        public function ads()
        {
            return $this->belongsToMany(Ads::class, 'categories4ads');
        }
    }
