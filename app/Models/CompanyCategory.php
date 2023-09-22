<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CompanyCategory extends Model
    {
        protected $table = "company_category";
//    protected $primaryKey = 'category_id';
        protected $fillable = ['id', 'name', 'slug', 'image', 'parent_id'];


        public function category()
        {
            return $this->hasMany(CompanyCategory::class, 'company_id', 'category_id');
        }

        public function subcategories()
        {
            return $this->hasMany(CompanyCategory::class, 'parent_id');
        }

        public function parentCategory()
        {
            return $this->belongsTo(CompanyCategory::class, 'parent_id');
        }

        public function company()
        {
            return $this->belongsToMany(Companies::class);
        }
    }
