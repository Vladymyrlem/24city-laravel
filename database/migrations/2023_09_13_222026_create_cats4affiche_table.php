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
        if (!Schema::hasTable('cats4affiche')) {
            Schema::create('cats4affiche', function (Blueprint $table) {
                $table->unsignedBigInteger('affiche_id');
                $table->unsignedBigInteger('category_id');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('affiche_id')->references('id')->on('affiche')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('affiche_categories')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cats4affiche');
    }
};
