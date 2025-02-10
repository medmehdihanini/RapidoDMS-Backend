<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('dirigeant')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('pays')->nullable();
            $table->text('ville')->nullable();
            $table->text('adresse')->nullable();
            $table->text('code_postal')->nullable();
            $table->string('email')->nullable();
            $table->string('site_web')->nullable();
            $table->string('num_TVA')->nullable();
            $table->string('naf')->nullable();
            $table->string('domaine')->nullable();
            $table->string('lien_facebook')->nullable();
            $table->string('lien_linkedin')->nullable();
            $table->decimal('chiffre_affaires', 15, 2)->nullable();
            $table->string('telephone')->nullable();
            $table->integer('effectif')->nullable();
            $table->string('siret')->nullable();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('company_id')->constrained('companies')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entreprises');
    }
};
