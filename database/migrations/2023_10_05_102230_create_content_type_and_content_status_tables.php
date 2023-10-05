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
        Schema::create('content_types', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->enum('action', ['read', 'watch']);
        });

        Schema::create('content_statuses', function (Blueprint $table) {
           $table->id();
           $table->timestamps();
           $table->string('name');
        });

        Schema::create('content_status_content_type', function (Blueprint $table) {
            $table->unsignedBigInteger('content_status_id');
            $table->unsignedBigInteger('content_type_id');

            $table->foreign('content_status_id', 'fk_content_status_id')
                ->references('id')->on('content_statuses')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('content_type_id', 'fk_content_type_id')
                ->references('id')->on('content_types')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('content_status_content_type', function(Blueprint $table) {
            $table->dropForeign(['content_status_id', 'content_type_id']);
        });
        Schema::dropIfExists('content_types');
        Schema::dropIfExists('content_statuses');
        Schema::dropIfExists('content_status_content_type');
    }
};
