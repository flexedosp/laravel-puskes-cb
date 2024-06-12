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
        Schema::create('modul', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('slug');
            $table->string('gambar');
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
        Schema::dropIfExists('modul');
    }
};
