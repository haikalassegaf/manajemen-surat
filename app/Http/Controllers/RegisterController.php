<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }

    public function register(Request $request){
        // Validasi input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string',
            'nip' => 'required|string|max:255',
            'unit' => 'required|in:ACR,Consumer,FTRM,RBC,Risk,SME,Operasional',
            'no_telepon' => 'required|string|max:255',
        ]);
    
        // Buat entri pengguna baru dalam tabel 'users'
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nip' => $validatedData['nip'],
            'no_telepon' => $validatedData['no_telepon'],
            'unit' => $validatedData['unit'],
        ]);
    
        // Buat entri pegawai baru dalam tabel 'pegawais'
        $pegawai = Pegawai::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'nip' => $validatedData['nip'],
            'no_telepon' => $validatedData['no_telepon'],
            'unit' => $validatedData['unit'],
        ]);
        return redirect()->intended('login')->with('success', 'Data added successfully');
    }

    // public function register(Request $request){

    //     $input = $request->all();

    //     User::create([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //         'nip' => $input['nip'],
    //         'no_telepon' => $input['no_telepon'],

    //     ]);

    //     Pegawai::create([
    //         'name' => $input['name'],
    //         'email' => $input['email'],
    //         'password' => Hash::make($input['password']),
    //         'nip' => $input['nip'],
    //         'no_telepon' => $input['no_telepon'],

    //     ]);
    //     return redirect()->intended('login')->with('success', 'Data added successfully');
    // }
}
