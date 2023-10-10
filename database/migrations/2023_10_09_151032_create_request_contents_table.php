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
        Schema::create('request_contents', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->date('end_date')->nullable();
            $table->unsignedBigInteger('type_id');
            $table->enum('current_status', ['released', 'stopped', 'ongoing', 'announced'])->nullable();
            $table->foreign('type_id')->references('id')->on('content_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('request_contents', function(Blueprint $table) {
            $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('request_contents');
    }
};
