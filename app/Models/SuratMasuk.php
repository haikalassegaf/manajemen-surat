<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    protected $table = 'surat_masuk';

    protected $fillable = [
        'tgl_surat_masuk',
        'no_surat',
        'jenis',
        'perihal',
        'penerima',
        'dari',
        'tertuju',
        'tgl_pembuatan',
        'status',
        'keterangan'
    ];
}
