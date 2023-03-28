<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_cat', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('category_id');

            $table->foreign('movie_id')->references('id')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('category_id')->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['movie_id','category_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_cat');
    }
};
