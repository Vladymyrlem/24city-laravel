<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use App\Models\Payments;

    class Companies extends Model
    {
        use HasFactory;

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
            'related_companies',
            'tags',
            'boss',
            'payments',
            'services_list',
            'additional_information',
            'seo',
            'gallery',
            'news',
            'contacts_fax',
            'contacts_phone',
            'contacts_comment-to-phone',
            'emails-group_email',
            'emails-group_comment-to-email',
            'connectivity_options_options_list',
            'connectivity_options_comment-to-option',
            'links_link',
            'social_links_social_link',
            'social_links_social_lists',
            'created_at',
            'updated_at'
        ];

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
            return $this->belongsToMany(CompanyEmails::class, 'emails4company', 'email_id', 'company_id');
        }
    }
