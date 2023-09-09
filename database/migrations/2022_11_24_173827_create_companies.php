<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title_company')->nullable();
            $table->longText('content')->nullable();
            $table->longText('company_category')->nullable();
            $table->string('thumbnail')->nullable();
            $table->text('adr_title')->nullable();
            $table->text('adr_url')->nullable();
            $table->text('adr_target')->nullable();
            $table->text('about_company')->nullable();
            $table->text('related_companies')->nullable();
            $table->string('tags')->nullable();
            $table->string('boss')->nullable();
            $table->string('payments')->nullable();
            $table->text('services_list')->nullable();
            $table->longtext('additional_information')->nullable();
            $table->string('seo')->nullable();
            $table->text('gallery')->nullable();
            $table->text('news')->nullable();
            $table->string('contacts_fax')->nullable();
            $table->string('contacts_phone')->nullable();
            $table->string('contacts_comment-to-phone')->nullable();
            $table->string('emails-group_email')->nullable();
            $table->string('emails-group_comment-to-email')->nullable();
            $table->string('connectivity_options_options_list')->nullable();
            $table->string('connectivity_options_comment-to-option')->nullable();
            $table->text('links_link')->nullable();
            $table->string('social_links_social_link')->nullable();
            $table->string('social_links_social_lists')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
