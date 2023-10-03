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
            Schema::table('ads', function (Blueprint $table) {
                $table->string('status')->default('published')->before('created_at');
            });
            Schema::table('affiche', function (Blueprint $table) {
                $table->string('status')->default('published')->before('created_at');
            });
            Schema::table('companies', function (Blueprint $table) {
                $table->string('status')->default('published')->before('created_at');
            });
            Schema::table('peoples', function (Blueprint $table) {
                $table->string('status')->default('published')->before('created_at');
            });
            Schema::table('real_estate', function (Blueprint $table) {
                $table->string('status')->default('published')->before('created_at');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::table('ads', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            Schema::table('affiche', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            Schema::table('companies', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            Schema::table('peoples', function (Blueprint $table) {
                $table->dropColumn('status');
            });
            Schema::table('real_estate', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    };
