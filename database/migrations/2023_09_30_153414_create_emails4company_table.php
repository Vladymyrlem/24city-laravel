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
            Schema::create('emails4company', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('email_id');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('email_id')->references('id')->on('emails')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('emails4company');
        }
    };
