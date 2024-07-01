<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PertanyaanPasien extends Model
{
    use HasFactory;
    protected $table = 'pertanyaan_pasien';
    protected $guarded = ['id'];
}
