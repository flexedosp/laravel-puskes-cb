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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->string('slug');
            $table->integer('terbit');
            $table->date('createdAt')->nullable();
            $table->string('createdBy')->nullable();
            $table->date('updatedAt')->nullable();
            $table->string('updatedBy')->nullable();
            $table->date('deletedAt')->nullable();
            $table->string('deletedBy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
