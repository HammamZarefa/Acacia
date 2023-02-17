<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->default(0);
            $table->string('name', 191)->nullable();
            $table->decimal('price_per_k', 18,8)->default(0);
            $table->bigInteger('min')->default(0);
            $table->bigInteger('max')->default(0);
            $table->text('details')->nullable();
            $table->bigInteger('api_service_id')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('services');
    }
}
