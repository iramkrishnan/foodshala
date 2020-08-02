<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id');
            $table->foreignId('restaurant_id');
            $table->foreignId('menu_item_id');
            $table->integer('quantity');
            $table->enum('menu_item_type', ['vegetarian', 'non-vegetarian']);
            $table->integer('menu_item_price');
            $table->timestamps();

            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('menu_item_id')->references('id')->on('menu_items');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_details');
    }
}
