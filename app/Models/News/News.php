<?php

    namespace App\Models\News;

    use App\Models\Tag;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class News extends Model
    {
        use HasFactory;

        protected $table = 'news';

        protected $fillable = ['id', 'title', 'content', 'excerpt', 'image_url', 'status', 'slug'];

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggables')->withTimestamps();
        }

        public function categories()
        {
            return $this->belongsToMany(NewsCategory::class, 'cats4news', 'category_id', 'news_id');
        }
    }
