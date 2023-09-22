<?php

    namespace App\Models\Affiche;

    use App\Models\Affiche\AfficheCategory;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Affiche extends Model
    {
        use HasFactory;

        protected $table = "affiche";
        protected $fillable = ['id', 'title', 'content', 'excerpt', 'event_date', 'category', 'image', 'slug'];

        public function categories()
        {
            return $this->belongsToMany(AfficheCategory::class, 'cats4affiche', 'affiche_id', 'category_id');
        }
    }
