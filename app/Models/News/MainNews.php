<?php

    namespace App\Models\News;

    use App\Models\Companies;
    use App\Models\News\MainNewsCategory;
    use App\Models\Tag;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class MainNews extends Model
    {
        use HasFactory, SoftDeletes;

        protected $table = 'mainnews';
        protected $fillable = ['id', 'title', 'content', 'excerpt', 'categories', 'tags', 'image', 'slug', 'status'];
        protected $connection = 'testing';

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggables')->withTimestamps();
        }

        public function categories()
        {
            return $this->belongsToMany(MainNewsCategory::class, 'main_news_main_news_category');
        }

        public function company()
        {
            return $this->belongsTo(Companies::class);
        }
    }
