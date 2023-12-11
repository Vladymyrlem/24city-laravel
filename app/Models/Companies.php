<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payments;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'title_company',
        'content',
        'company_category',
        'thumbnail',
        'adr_title',
        'adr_url',
        'adr_target',
        'about_company',
        'boss',
        'boss_position',
        'payments',
        'services_list',
        'additional_information',
        'seo',
        'gallery',
//        'news',
        'created_at',
        'updated_at'
    ];

    protected $table = 'companies';

//    protected $connection = 'testing';

    public function categories()
    {
        return $this->belongsToMany(CompanyCategory::class);
    }

    public function relatedCompanies()
    {
        return $this->belongsToMany(Companies::class, 'company_relationships', 'parent_company_id', 'child_company_id');
    }

//        public function contacts()
//        {
//            return $this->belongsToMany(Contacts::class, 'contacts', 'com', 'company_id');
//        }
    public function contacts()
    {
        return $this->hasMany(Contacts::class, 'company_id');
    }

    public function payments()
    {
        return $this->belongsToMany(Payments::class, 'payments4company', 'company_id', 'payment_id');
    }
//        public function payments()
//        {
//            return $this->hasMany(Payments::class);
//        }

    public function emails()
    {
        return $this->belongsToMany(Email::class, 'emails4company', 'email_id', 'company_id');
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }
}
