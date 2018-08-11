<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
           $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('category_id')->unsigned();
           // $table->foreign('categ_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->string('featured');

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
