<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Models\Widgets;

    class Sidebar extends Model
    {
        use HasFactory;

        protected $table = 'sidebars';
        protected $fillable = ['name'];

        public function widgets()
        {
            return $this->hasMany(Widgets::class);
        }
    }
