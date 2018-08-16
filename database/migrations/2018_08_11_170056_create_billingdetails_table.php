<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillingdetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billingdetails', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('quantity');
            $table->decimal('subtotal',8,2);
            $table->unsignedInteger('coupon_id');
            $table->unsignedInteger('bill_id');
            $table->softDeletes();
            $table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('billingdetails',function(Blueprint $table){
        $table->dropForeign('billingdetails_coupon_id_foreign');
        $table->dropColumn('coupon_id');
        $table->dropForeign('billingdetails_bill_id_foreign');
        $table->dropColumn('bill_id');
      });
        Schema::dropIfExists('billingdetails');
    }
}
