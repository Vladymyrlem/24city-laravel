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
            Schema::create('company_shares', function (Blueprint $table) {
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('share_id');
                $table->primary(['company_id', 'share_id']);
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('share_id')->references('id')->on('shares')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('company_shares');
        }
    };
