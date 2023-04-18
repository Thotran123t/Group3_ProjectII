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
        Schema::create('cart__products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_cart');
            $table->unsignedBigInteger('id_product')->nullable();
            $table->unsignedBigInteger('id_macbook')->nullable();
            $table->unsignedBigInteger('id_appwatch')->nullable();
            $table->integer('id_category');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('id_cart')->references('id')->on('carts')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_macbook')->references('id')->on('mac_books')->onDelete('cascade');
            $table->foreign('id_appwatch')->references('id')->on('app_watches')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart__products');
    }
};
