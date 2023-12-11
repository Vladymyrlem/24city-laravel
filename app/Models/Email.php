<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Email extends Model
    {
        use HasFactory;

        protected $table = 'emails';
        protected $fillable = ['company_id', 'value', 'link'];

        protected $connection = 'testing';

        public function company()
        {
            return $this->belongsTo(Companies::class, 'company_id');
        }
    }
