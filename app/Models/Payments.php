<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payments extends Model
{
    use HasFactory;

    protected $table = 'payments';
    protected $fillable = ['payment_name'];

    protected $connection = 'testing';

    public function payments()
    {
        return $this->hasMany(Payments::class, 'company_id', 'payment_id');
    }

    public function company()
    {
        return $this->belongsToMany(Companies::class, 'payments4company', 'payment_id');
    }
}
