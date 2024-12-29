<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItem extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'menu_id',
        'title',
        'type',
        'reference_id',
        'url',
        'parent_id',
        'order'
    ];

    protected $table = 'menu_items';
    /**
     * Дочірні пункти меню.
     */
    public function children()
    {
        return $this->hasMany(MenuItem::class, 'parent_id');
    }
}
