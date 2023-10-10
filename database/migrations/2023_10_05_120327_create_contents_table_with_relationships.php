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
        Schema::create('contents', function (Blueprint $table) {
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

        Schema::create('user_content', function(Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('content_id');

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('content_id')
                ->references('id')->on('contents')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_contents', function(Blueprint $table) {
            $table->dropForeign(['user_id', 'content_id']);
        });
        Schema::table('contents', function(Blueprint $table) {
           $table->dropForeign(['type_id']);
        });
        Schema::dropIfExists('user_contents');
        Schema::dropIfExists('contents');
    }
};
