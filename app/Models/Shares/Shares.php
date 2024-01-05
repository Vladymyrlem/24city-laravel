<?php

namespace App\Models\Shares;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shares extends Model
{
    use HasFactory;

    protected $table = 'shares';

    protected $fillable = ['id', 'title', 'share_from', 'share_to', 'image', 'content', 'excerpt', 'slug'];
}
