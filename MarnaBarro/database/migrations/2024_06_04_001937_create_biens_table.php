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
        Schema::create('biens', function (Blueprint $table) {
            $table->id();
            $table->string('nom'); //
            $table->text('description');
            $table->string('status')->nullable();
            $table->string('categorie'); // categorie du bien (ex: immobilier, vehicule, etc.)
            $table->string('addresse');
            $table->string('image');
            $table->date('date_publier');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biens');
    }
};
