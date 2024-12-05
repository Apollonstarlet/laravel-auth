<?php
   
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
   
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('firstname', 30)->nullable()->default(null);
            $table->string('lastname', 30)->nullable()->default(null);
            $table->string('email');
            $table->enum('role', array('user', 'editor', 'admin'));
            $table->string('img')->default('images/user/default.jpg');
            $table->string('password');
            $table->string('phone', 30)->nullable()->default(null);
            $table->string('address', 100)->nullable()->default(null);
            $table->enum('status', array('Active', 'Inactive'))->default('Active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }
  
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}