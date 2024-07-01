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
        Schema::create('pertanyaan_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
        $table->string('no_telp')->unique();
            $table->string('jenis_kelamin');
            $table->mediumText('isi_pertanyaan');
            // $table->dateTime('created_at');
            $table->integer('is_read');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pertanyaan_pasien');
    }
};
