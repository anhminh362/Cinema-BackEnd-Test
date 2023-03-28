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
        Schema::create('movie_sub', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('subtitle_id');
            $table->foreign('movie_id')->references('id')
                ->on('movies')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('subtitle_id')->references('id')
                ->on('subtitles')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unique(['movie_id', 'subtitle_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_sub');
    }
};
