<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->string('icon')->nullable();

            $table->timestamps();
        });

        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('cover');
            $table->string('author');
            $table->string('pages');
            $table->string('publisher');
            $table->string('language');
            $table->float('price');
            $table->text('description');
            $table->string('icon')->nullable();
            $table->boolean('is_available')->default(true);
            $table->integer('genre_id')->unsigned();
            $table->foreign('genre_id')->on('genres')->references('id')->cascadeOnDelete()->cascadeOnUpdate();

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
        Schema::dropIfExists('books');
    }
};
