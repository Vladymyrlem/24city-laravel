<?php

namespace App\Models\Press;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Press extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "press";
    protected $fillable = ['id', 'title', 'content', 'excerpt', 'image', 'slug'];
}
