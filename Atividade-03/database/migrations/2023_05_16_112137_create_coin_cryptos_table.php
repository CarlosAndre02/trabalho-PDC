<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinCryptosTable extends Migration
{
    public function up(): void
    {
        Schema::create('coin_cryptos', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['1' => 'BITCOIN', '2' => 'ETHEREUM', '3' => 'LITECOIN'])->default('BITCOIN')->unique();
            $table->char('acronym', 3)->unique();
            $table->float('value_in_real');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coin_cryptos');
    }
}
