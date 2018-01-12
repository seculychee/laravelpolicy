<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::create('password_resets', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('email');
            $table->string('token');
            $table->timestamp('created_at')->nullable();

            $table->index("email");
            $table->index("token");
            $table->index([
                "email", "token"
            ]);
        });
        Schema::create('user_roles', function (Blueprint $table) {

            $table->bigIncrements("id");
            $table->timestamps();
            $table->bigInteger("user_id")->unsigned();
            $table->integer("role_id")->unsigned();
        });

        Schema::create('roles', function (Blueprint $table) {

            $table->increments("id");
            $table->string("slug");
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
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('user_roles');
    }
}
