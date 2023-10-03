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
            Schema::create('test_contacts', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('company_id'); // Зовнішній ключ для зв'язку з companies таблицею
                $table->foreign('company_id')
                    ->references('id')
                    ->on('test_company')
                    ->onDelete('cascade'); // Видалення зв'язаних записів при видаленні компанії
                $table->string('contacts_fax')->nullable();
                $table->string('contacts_phone')->nullable();
                $table->text('contacts_comment_to_phone')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('test_contacts');
        }
    };
