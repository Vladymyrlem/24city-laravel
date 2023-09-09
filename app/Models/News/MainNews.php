<?php

    namespace App\Models\News;

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

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggables')->withTimestamps();
        }

        public function categories()
        {
            return $this->belongsToMany(MainNewsCategory::class, 'cats4mainnews');
        }
    }
