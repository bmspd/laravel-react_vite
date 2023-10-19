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
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('original_name')->nullable();
            $table->string('mime_type')->nullable();
            $table->string('path');
            $table->timestamps();
        });

        Schema::table('contents', function (Blueprint $table) {
            $table->unsignedBigInteger('poster_id')->nullable();
            $table->foreign('poster_id')->references('id')->on('images');
        });
        Schema::table('request_contents', function (Blueprint $table) {
            $table->unsignedBigInteger('poster_id')->nullable();
            $table->foreign('poster_id')->references('id')->on('images');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contents', function (Blueprint $table) {
            $table->dropForeign(['poster_id']);
            $table->dropColumn(['poster_id']);
        });
        Schema::table('request_contents', function (Blueprint $table) {
            $table->dropForeign(['poster_id']);
            $table->dropColumn(['poster_id']);
        });
        Schema::dropIfExists('images');
    }
};
