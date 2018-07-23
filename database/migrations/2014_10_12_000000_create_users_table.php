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
            $table->string('email',50)->unique();
            $table->string('name',25);
            $table->string('lastname',25);
            $table->string('lastname1',25);
            $table->text('direction');
            $table->string('password',25);
            $table->string('phone',9);
            $table->integer('rol_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
            $table->rememberToken();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('users',function(Blueprint $table){
        $table->dropForeign('users_rol_id_foreign');
        $table->dropColumn('rol_id');
      });

        Schema::dropIfExists('users');
    }
}
