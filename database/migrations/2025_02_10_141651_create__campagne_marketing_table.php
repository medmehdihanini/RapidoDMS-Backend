<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('campagne_marketings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campagne_id')->constrained('campagnes')->onDelete('cascade'); // Héritage de Campagne
            $table->json('annonces'); // Données des annonces
            $table->float('roi'); // Retour sur investissement
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campagne_marketings');
    }
};
