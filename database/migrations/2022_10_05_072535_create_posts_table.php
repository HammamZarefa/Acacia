<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('title',255);
            $table->string('short_desc',255);
            $table->string('cover',100);
            $table->string('slug',100);
            $table->longText('body');
            $table->string('author',255);
            $table->integer('views')->default(0);
            $table->date('date');
            $table->enum('status',['PUBLISHED','DRAFT','FEATURED']);
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
        Schema::dropIfExists('posts');
    }
}
