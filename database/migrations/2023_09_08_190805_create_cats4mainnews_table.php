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

            Schema::create('cats4mainnews', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('mainnews_id');
                $table->unsignedBigInteger('category_id');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('mainnews_id')->references('id')->on('mainnews')->onDelete('cascade');
                $table->foreign('category_id')->references('id')->on('mainnews_categories')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('cats4mainnews');
        }
    };
