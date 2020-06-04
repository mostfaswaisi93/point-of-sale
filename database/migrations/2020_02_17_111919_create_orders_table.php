<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id')->unsigned()->onDelete('cascade');
            $table->double('items_price', 8, 2)->nullable();
            $table->double('discount', 8, 2)->nullable();
            $table->double('after_discount', 8, 2)->nullable();
            $table->double('amount_paid', 8, 2)->nullable();
            $table->double('remaining_amount', 8, 2)->nullable();
            $table->double('total_price', 8, 2)->nullable();
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
        Schema::dropIfExists('orders');
    }
}
