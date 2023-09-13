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
            return $this->belongsToMany(AdsCategory::class, 'categories4ads', 'id');
        }

        public function ads()
        {
            return $this->belongsToMany(Ads::class, 'categories4ads');
        }
    }
