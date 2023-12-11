<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class CompanySocial extends Model
    {
        use HasFactory;

        protected $table = 'company_social';
        protected $fillable = ['company_id', 'social_link', 'social_type'];

        protected $connection = 'testing';

        public function social()
        {
            return $this->hasMany(CompanySocial::class);
        }

        public function company()
        {
            return $this->belongsTo(Companies::class, 'company_id');
        }
    }
