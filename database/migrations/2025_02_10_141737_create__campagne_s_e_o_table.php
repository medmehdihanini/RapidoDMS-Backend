<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('campagne_seos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagne_id')->constrained('campagnes')->onDelete('cascade');
            $table->json('backlinks'); // Liste des backlinks
            $table->float('score_concurrence'); // Score de concurrence
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campagne_seos');
    }
};
