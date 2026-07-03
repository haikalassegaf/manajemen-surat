<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengirimanSurat extends Model
{
    use HasFactory;
    protected $table = 'pengiriman';
    protected $fillable = [
        'tgl_pengiriman',
        'no_surat',
        'jenis',
        'perihal',
        'dari',
        'tertuju',
        'jenis_pengiriman',
        'penerima',
        'ekspedisi',
        'status',
        'bukti_foto',
        'pengirim',

    ];
}