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
            $table->text('address');
            $table->string('password');
            $table->string('phone',9);
            $table->integer('rol_id')->unsigned();
            $table->unsignedInteger('collectioncenter_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('rol_id')->references('id')->on('rols')->onDelete('cascade');
            $table->foreign('collectioncenter_id')->references('id')->on('collectioncenters')->onDelete('cascade');
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
        $table->dropForeign('users_collectioncenter_id_foreign');
        $table->dropColumn('collectioncenter_id');
      });

        Schema::dropIfExists('users');
    }
}
