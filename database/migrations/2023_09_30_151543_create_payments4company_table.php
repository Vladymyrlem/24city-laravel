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
            Schema::create('payments4company', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('payment_id');
                $table->timestamps();
                $table->softDeletes();
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('payments4company');
        }
    };
