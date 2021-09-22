<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_product', function (Blueprint $table) {
                $table->primary(['order_id', 'product_id']);
                $table->unsignedInteger('order_id');
                $table->foreign('order_id')->references('id')->on('orders');
                $table->unsignedInteger('product_id');
                $table->foreign('product_id')->references('id')->on('products');
                $table->timestamps();
            }
        );
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
