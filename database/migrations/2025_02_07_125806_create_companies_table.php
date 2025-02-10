<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable();
            $table->string('siret')->nullable();
            $table->string('adresse')->nullable();
            $table->string('code_postal')->nullable();
            $table->string('ville')->nullable();
            $table->string('charte_graphique')->nullable();
            $table->string('email')->nullable();
            $table->string('telephone')->nullable();
            $table->string('site_web')->nullable();
            $table->string('banque')->nullable();
            $table->string('switch')->nullable();
            $table->string('iban')->nullable();
            $table->string('logo')->nullable();
            $table->string('password')->nullable();
            $table->string('host')->default('imap.gmail.com');
            $table->integer('port')->default(993);
            $table->string('encryption')->default('ssl');
            $table->boolean('validate_cert')->default(true);
            $table->string('stripe_secret')->nullable();
            $table->string('sms_id')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
