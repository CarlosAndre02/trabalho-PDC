<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryTransitionsTable extends Migration
{
    public function up(): void
    {
        Schema::create('history_transitions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->integer('amount');
            $table->string('description');

            $table->bigInteger('from_wallet_id')->unsigned();
            $table->foreign('from_wallet_id')->references('id')->on('wallets');

            $table->bigInteger('to_wallet_id')->unsigned()->nullable();
            $table->foreign('to_wallet_id')->references('id')->on('wallets');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('history_transitions');
    }
}
