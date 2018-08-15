<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailredemptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailredemptions', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('kilograms',8,2);
            $table->decimal('subtotal',8,2);
            $table->unsignedInteger('recyclablematerial_id');
            $table->unsignedInteger('redeem_id');
            $table->foreign('recyclablematerial_id')->references('id')->on('recyclablematerials')->onDelete('cascade');
            $table->foreign('redeem_id')->references('id')->on('redeems')->onDelete('cascade');
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
      Schema::table('detailredemptions',function(Blueprint $table){
        $table->dropForeign('detailredemptions_recyclablematerial_id_foreign');
        $table->dropColumn('recyclablematerial_id');
        $table->dropForeign('detailredemptions_redeem_id_foreign');
        $table->dropColumn('redeem_id');
      });
      Schema::dropIfExists('detailredemptions');
    }
}
