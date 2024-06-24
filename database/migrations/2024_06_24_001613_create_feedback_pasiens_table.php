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
        Schema::create('feedback_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fasilitas');
            $table->string('nilai_pelayanan');
            $table->string('nilai_kebersihan');
            $table->string('nilai_kebersihan');
            $table->text('isi_feedback');
            $table->string('nama');
            $table->int('usia');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('no_telp');
            $table->int('is_anonim');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedback_pasiens');
    }
};
