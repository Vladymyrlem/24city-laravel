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
            Schema::create('widgets', function (Blueprint $table) {
                $table->id();
                $table->string('type'); // Type of widget (e.g., "link," "image," etc.)
                $table->text('content'); // Content of the widget
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('widgets');
        }
    };
