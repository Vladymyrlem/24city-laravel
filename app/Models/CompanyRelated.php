<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class CompanyRelated extends Model
    {
        use HasFactory, SoftDeletes;

        protected $table = 'company_relationships';
        protected $fillable = ['parent_company_id', 'child_company_id']; // Define the fillable columns

        public function parentCompany()
        {
            return $this->belongsTo(Companies::class, 'parent_company_id');
        }

        public function childCompany()
        {
            return $this->belongsTo(Companies::class, 'child_company_id');
        }
    }
