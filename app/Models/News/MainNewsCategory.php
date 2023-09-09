<?php

    namespace App\Models\News;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;
    use App\Models\News\MainNews;

    class MainNewsCategory extends Model
    {
        use HasFactory, SoftDeletes;

        protected $table = "mainnews_categories";
        protected $fillable = ['id', 'name', 'slug', 'parent_id'];

        public function categories()
        {
            return $this->belongsToMany(MainNewsCategory::class, 'mainnews_id', 'mainnews_id');
        }

        public function mainnews()
        {
            return $this->hasMany(MainNews::class, 'id');
        }
    }
