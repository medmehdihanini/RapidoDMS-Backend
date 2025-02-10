<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('api_integrations', function (Blueprint $table) {
            $table->foreignId('entreprise_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('api_integrations', function (Blueprint $table) {
            // Supprimer la contrainte et la colonne 'entreprise_id'
            $table->dropForeign(['entreprise_id']);
            $table->dropColumn('entreprise_id');
        });
    }
};
