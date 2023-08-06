<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('summoner_id');
            $table->string('game_id');
            $table->boolean('win');
            $table->integer('kills');
            $table->integer('deaths');
            $table->integer('assists');
            $table->timestamps();

            $table->foreign('summoner_id')->references('id')->on('summoners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('games');
    }
};
