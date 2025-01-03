<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class TestCompany extends Model
    {
        use HasFactory;

        protected $table = 'test_company';
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

        public function contacts()
        {
            return $this->hasMany(Contacts::class, 'company_id');
        }
    }
