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
        Schema::create('menu_addons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('add_id')->nullable();
            $table->timestamps();
            $table->foreign('menu_id')
                  ->references('id')->on('menus')
                  ->onDelete('cascade');
            $table->foreign('add_id')
                  ->references('id')->on('addons')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_addons');
    }
};
