<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id')->default(0);
            $table->integer('category_id')->default(0);
            $table->integer('service_id')->default(0);
            $table->integer('api_service_id')->default(0);
            $table->string('link')->nullable();
            $table->bigInteger('quantity')->default(0);
            $table->decimal('price', 18,8)->default(0);
            $table->bigInteger('start_counter')->default(0);
            $table->bigInteger('remain')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0 = Pending, 1 = Processing, 2 = Completed, 3 = Cancelled, 4 = Refunded');
            $table->boolean('api_order')->default(0);
            $table->bigInteger('api_order_id')->default(0);
            $table->boolean('order_placed_to_api')->default(0);
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
