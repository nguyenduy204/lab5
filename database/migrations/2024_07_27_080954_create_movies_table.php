<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('poster', 255)->nullable();
            $table->string('intro', 255);
            $table->date('release_date');
            $table->foreignId('genre_id')->constrained('genes')->onDelete('cascade');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('movies');
    }
    
};
