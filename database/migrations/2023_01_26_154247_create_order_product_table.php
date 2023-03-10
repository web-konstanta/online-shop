<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('order_id');
            $table->index('order_id', 'order_order_cart_idx');
            $table->foreign('order_id', 'order_order_cart_fk')->on('orders')->references('id');

            $table->unsignedBigInteger('product_id');
            $table->index('product_id', 'product_order_product_idx');
            $table->foreign('product_id', 'product_order_product_fk')->on('products')->references('id');

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
        Schema::dropIfExists('order_product');
    }
}
