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
        Schema::create('menu_addon_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->unsignedBigInteger('addcat_id')->nullable();
            $table->timestamps();
            $table->foreign('menu_id')
                  ->references('id')->on('menus')
                  ->onDelete('cascade');
            $table->foreign('addcat_id')
                  ->references('id')->on('addon_categories')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_addon_categories');
    }
};
