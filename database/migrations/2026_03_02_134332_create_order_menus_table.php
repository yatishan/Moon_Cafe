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
        Schema::create('order_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->integer('price');
            $table->integer('qty');
            $table->timestamps();
            $table->foreign('order_id')
                  ->references('id')->on('orders')
                  ->onDelete('cascade');
            $table->foreign('menu_id')
                  ->references('id')->on('menus')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
