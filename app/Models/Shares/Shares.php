<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Shares extends Model
    {
        use HasFactory;

        protected $table = 'shares';

        protected $fillable = ['id', 'title', 'content', 'excerpt'];
    }
