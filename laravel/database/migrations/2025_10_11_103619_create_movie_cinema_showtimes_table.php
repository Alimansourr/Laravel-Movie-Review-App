<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('movie_cinema_showtimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('movie_id')->constrained('movies')->onDelete('cascade');
            $table->foreignId('cinema_id')->constrained('cinemas')->onDelete('cascade');
            $table->date('show_date');
            $table->time('show_time');
            $table->integer('total_seats');  // total capacity
            $table->integer('available_seats'); // seats remaining
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('movie_cinema_showtimes');
    }
};
