<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectioncentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collectioncenters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->text('direction');
            $table->boolean('enabled');
            $table->unsignedInteger('province_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('collectioncenters',function(Blueprint $table){
        $table->dropForeign('collectioncenters_province_id_foreign');
        $table->dropColumn('province_id');
      });
      Schema::dropIfExists('collectioncenters');
    }
}
