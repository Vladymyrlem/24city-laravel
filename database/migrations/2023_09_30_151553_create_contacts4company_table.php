<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('contacts4company')) {

            Schema::create('contacts4company', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('contact_id');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('contact_id')->references('id')->on('contacts')->onDelete('cascade');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts4company');
    }
};
