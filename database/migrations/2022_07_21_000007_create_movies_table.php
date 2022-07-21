<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('movie_id');
            $table->string('poster_path')->nullable();
            $table->string('backdrop_path')->nullable();
            $table->boolean('adult')->default(false);
            $table->longText('overview');
            $table->date('release_date');
            $table->string('original_title');
            $table->string('original_language');
            $table->string('title');
            $table->json('genre_ids')->nullable();
            $table->decimal('popularity', 10, 2)->default(0);
            $table->integer('vote_count')->default(0);
            $table->boolean('video')->default(false);
            $table->decimal('vote_average')->default(0);

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
        Schema::dropIfExists('movies');
    }
};
