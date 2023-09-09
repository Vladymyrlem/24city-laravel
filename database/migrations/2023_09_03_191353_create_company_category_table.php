<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateCompanyCategoryTable extends Migration
    {
        public function up()
        {
            Schema::create('category_company', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id');
                $table->unsignedBigInteger('category_id');
                $table->timestamps();
                $table->softDeletes();

                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
                $table->foreign('category_id')->references('category_id')->on('company_category')->onDelete('cascade');
            });
        }

        public function down()
        {
            Schema::dropIfExists('category_company');
        }
    }
