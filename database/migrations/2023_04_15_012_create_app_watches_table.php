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
        Schema::create('app_watches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('id_category'); 
            $table->unsignedBigInteger('id_size'); 
            $table->unsignedBigInteger('id_color'); 
            $table->unsignedBigInteger('id_capacity'); 
            $table->integer('price');
            $table->integer('quantity');
            $table->text('description');
            $table->timestamps();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('id_size')->references('id')->on('sizes')->onDelete('cascade');
            $table->foreign('id_color')->references('id')->on('colors')->onDelete('cascade');
            $table->foreign('id_capacity')->references('id')->on('capacities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('app_watches');
    }
};
