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
        Schema::create('horoscopes', function (Blueprint $table) {
            $table->enum('signo', [
                1 => 'Capricórnio', 2 => 'Aquário', 3 => 'Peixes',
                4 => 'Áries', 5 => 'Touro', 6 => 'Gêmeos',
                7 => 'Câncer', 8 => 'Leão', 9 => 'Virgem',
                10 => 'Libra', 11 => 'Escorpião', 12 => 'Sagitário'])->primary();

            $table->string('message_basic', 500);
            $table->string('work_basic', 1000);

            $table->string('message_premium', 1000);
            $table->string('lucky_premium', 1000);
            $table->string('love_premium', 1000);
            $table->string('health_premium', 1000);

            $table->string('start_date',10);
            $table->string('end_date',10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('horoscopes');
    }
};
