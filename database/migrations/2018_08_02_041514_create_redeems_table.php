<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeems', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('total',8,2);
            $table->unsignedInteger('userclient_id');
            $table->unsignedInteger('useradmin_id');
            $table->unsignedInteger('collectioncenter_id');
            $table->foreign('userclient_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('useradmin_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('collectioncenter_id')->references('id')->on('collectioncenters')->onDelete('cascade');
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
      Schema::table('redeems',function(Blueprint $table){
        $table->dropForeign('redeems_userclient_id_foreign');
        $table->dropColumn('userclient_id');
        $table->dropForeign('redeems_useradmin_id_foreign');
        $table->dropColumn('useradmin_id');
        $table->dropForeign('redeems_collectioncenter_id_foreign');
        $table->dropColumn('collectioncenter_id');
      });
      Schema::dropIfExists('redeems');
    }
}
