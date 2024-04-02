<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('user_favorite_giphy_gifs', function (Blueprint $table) {
            $table->id();
            $table->string('gif_id');
            $table->string('alias')->unique();
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->unique(['gif_id', 'alias', 'user_id'], 'gif_alias_user_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('user_favorite_giphy_gifs');
    }
};