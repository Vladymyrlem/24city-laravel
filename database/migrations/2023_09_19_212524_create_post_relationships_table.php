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
            Schema::create('company_relationships', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('parent_company_id');
                $table->unsignedBigInteger('child_company_id');
                $table->timestamps();

                $table->foreign('parent_company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');

                $table->foreign('child_company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('company_relationships');
        }
    };
