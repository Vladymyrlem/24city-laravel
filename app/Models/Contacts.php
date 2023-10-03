<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Contacts extends Model
    {
        use HasFactory;

        protected $table = 'contacts';
        protected $fillable = ['company_id', 'contacts_phone', 'contacts_fax', 'contacts_comment_to_phone'];

        public function contacts()
        {
            return $this->hasMany(Contacts::class);
        }

        public function company()
        {
            return $this->belongsTo(Companies::class, 'company_id', 'email_id');
        }
    }
