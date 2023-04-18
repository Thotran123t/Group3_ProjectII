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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_macbook');
            $table->unsignedBigInteger('id_appwatch');
            $table->unsignedBigInteger('id_customer');
            $table->integer('id_category');
            $table->text('content');
            $table->timestamps();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('id_macbook')->references('id')->on('mac_books')->onDelete('cascade');
            $table->foreign('id_appwatch')->references('id')->on('app_watches')->onDelete('cascade');
            $table->foreign('id_customer')->references('id')->on('customers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
