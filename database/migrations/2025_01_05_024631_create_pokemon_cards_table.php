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
        Schema::create('pokemon_cards', function (Blueprint $table) {
            $table->id();
            $table->string('cardname', 50)->nullable()->default(null);
            $table->string('img')->default('images/card/default.jpg');
            $table->string('serial', 10)->nullable()->default(null);
            $table->string('yea', 10)->nullable()->default(null);
            $table->enum('lan', array('English', 'Japanese', 'Chinese', 'Korean'));
            $table->string('variant', 50)->nullable()->default(null);
            $table->string('front', 10)->nullable()->default(null);
            $table->string('sidecorners', 10)->nullable()->default(null);
            $table->string('back', 10)->nullable()->default(null);
            $table->string('centring', 10)->nullable()->default(null);
            $table->string('overall', 10)->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_cards');
    }
};
