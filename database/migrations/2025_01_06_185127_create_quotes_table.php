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
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rfno')->unique();
			$table->boolean('multi')->nullable();
			$table->text('cdes')->nullable();
			$table->string('cmak', 255)->nullable();
			$table->string('cran', 255)->nullable();
			$table->string('cyer', 10)->nullable();
			$table->string('cbdy', 255)->nullable();
			$table->string('cbdt', 100)->nullable();
			$table->string('cgbx', 255)->nullable();
			$table->string('cfue', 100)->nullable();
			$table->string('cvin', 100)->nullable();
			$table->string('cenn', 500)->nullable();
			$table->string('cccs', 255)->nullable();
			$table->string('cclr', 255)->nullable();
			$table->string('creg', 255)->nullable();
			$table->string('unam', 255)->nullable();
			$table->string('uloc', 255)->nullable();
			$table->string('upos', 255)->nullable();
			$table->string('uphn', 100)->nullable();
			$table->string('umob', 100)->nullable();
			$table->string('ueml', 500)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quotes');
    }
};
