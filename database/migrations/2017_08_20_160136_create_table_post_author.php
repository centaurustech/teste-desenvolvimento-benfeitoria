<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePostAuthor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_author', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('author_id')->unsigned();
            $table->primary(['post_id','author_id']);
            $table->foreign('post_id')->references('id')->on('posts')
            ->onUpdate('cascade');
            $table->foreign('author_id')->references('id')->on('authors')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_author');
    }
}
