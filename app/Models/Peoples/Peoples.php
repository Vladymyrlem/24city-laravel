<?php

    namespace App\Models\Peoples;

    use App\Models\Tag;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Peoples extends Model
    {
        use HasFactory;

        protected $table = 'peoples';
        protected $fillable = ['id', 'title', 'content', 'excerpt', 'image', 'slug'];

        public function tags()
        {
            return $this->morphToMany(Tag::class, 'taggables')->withTimestamps();
        }
    }
