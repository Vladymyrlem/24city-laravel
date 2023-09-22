<?php

    namespace App\Models\Affiche;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class AfficheCategory extends Model
    {
        use HasFactory;

        protected $table = "affiche_categories";
        protected $fillable = ['id', 'name', 'slug', 'parent_id'];

        public function categories()
        {
            return $this->hasMany(AfficheCategory::class, 'affiche_id', 'category_id');
        }

        public function affiche()
        {
            return $this->belongsToMany(Affiche::class, 'cats4affiche', 'category_id', 'affiche_id');
        }
    }
