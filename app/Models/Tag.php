<?php

namespace App\Models;

use App\Main;
use App\Models\News\MainNews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\News\News;

class Tag extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'tags';

    protected $fillable = [
        'name',
        'slug'
    ];
    protected $connection = 'testing';

    /**
     * Получить все посты, которым присвоен этот тег.
     */
    public function news()
    {
        return $this->morphedByMany(News::class, 'taggables');
    }

    /**
     * Получить все видео, которым присвоен этот тег.
     */
    public function mainnews()
    {
        return $this->morphedByMany(MainNews::class, 'taggables');
    }
}
