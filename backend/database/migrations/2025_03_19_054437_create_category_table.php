<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up() 
    {
        Schema::create('category', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // Store category as a simple string
            $table->string('image'); // Store image path
            $table->timestamps();
        });
    }

     
    public function down() 
    {
        Schema::dropIfExists('category');
    }
};
