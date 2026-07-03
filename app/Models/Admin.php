<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Admin extends Model
{
    protected $table = 'admin';
    protected $fillable = [
        'name',
        'email',
        'password',
        'nip',
        'no_telepon',
        'profile_image',
        'unit',
    ];

    // Definisikan hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
