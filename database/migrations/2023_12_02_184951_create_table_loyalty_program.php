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
            Schema::create('loyalty_program', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id'); // Зовнішній ключ для зв'язку з companies таблицею
                $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade'); // Видалення зв'язаних записів при видаленні компанії
                $table->string('loyalty_type')->nullable();
                $table->string('loyalty_value')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('loyalty_program');
        }
    };
