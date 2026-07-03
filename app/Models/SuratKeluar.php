<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;
    protected $table = 'surat_keluar';
    protected $fillable = [
        'tgl_input_surat',
        'no_surat',
        'jenis',
        'perihal',
        'pengirim',
        'dari',
        'tertuju',
        'status'
    ];

    public function pengirimanSurat()
    {
        return $this->hasMany(PengirimanSurat::class, 'no_surat', 'no_surat');
    }
}
