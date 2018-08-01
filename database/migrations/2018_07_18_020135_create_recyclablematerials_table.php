<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecyclablematerialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recyclablematerials', function (Blueprint $table) {
          $table->increments('id');
          $table->string('name',25);
          $table->string('image',200);
          $table->decimal('price',8,2);
          $table->string('color',7);//codigo del color #000000
          $table->softDeletes();
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
        Schema::table('recyclablematerials',function(Blueprint $table){
          $table->dropForeign('recyclablematerials_user_id_foreign');
          $table->dropColumn('user_id');
        });
        Schema::dropIfExists('recyclablematerials');
    }
}
