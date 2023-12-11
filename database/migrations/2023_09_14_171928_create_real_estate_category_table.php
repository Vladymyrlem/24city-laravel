<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('real_estate_category', function (Blueprint $table) {
                $table->id();
                $table->string('name', 255);
                $table->string('slug', 255);
                $table->integer('parent_id')->nullable()->default(null);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('real_estate_category');
        }
    };
