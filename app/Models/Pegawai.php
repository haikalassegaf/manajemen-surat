<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'no_telepon',
        'profile_image',
        'unit',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
