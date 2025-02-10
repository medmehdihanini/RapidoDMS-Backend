<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('campagnes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade'); // Lien avec Entreprise
            $table->enum('type', ['SEO', 'Marketing']); // Type de campagne
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campagnes');
    }
};
