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
            Schema::create('shares', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->text('content')->nullable();
                $table->text('excerpt')->nullable();
                $table->date('share_from')->nullable();
                $table->date('share_to')->nullable();
                $table->string('image')->nullable();
                $table->string('slug');
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
            Schema::dropIfExists('shares');
        }
    };
