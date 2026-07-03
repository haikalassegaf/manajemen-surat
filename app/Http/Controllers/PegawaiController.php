<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PegawaiController extends Controller
{
    public function listAkunPegawai(Request $request)
    {
        $akunPegawai = Pegawai::all();
        return view('admin.pegawaiAccount', ['dataPegawai' => $akunPegawai]);
    }

    public function create()
    {
        return view('admin.addAkunPegawai');
    }

    public function addPegawai(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5',
            'unit' => 'required|in:ACR,Consumer,FTRM,RBC,Risk,SME,Operasional',
            'no_telepon' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = new User;

        $data->name = $request->name;
        $data->nip = $request->nip;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->unit = $request->unit;
        $data->no_telepon = $request->no_telepon;
        $data->role = '0';

        $data->save();

        if ($data->role == 0) {
            Pegawai::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'nip' => $data->nip,
                'unit' => $data->unit,
                'no_telepon' => $data->no_telepon,
            ]);
        }

        return redirect()->route('pegawai')->with('success', 'User added successfully');
    }

    public function edit($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();

        return view('admin.editAkunPegawai', ['pegawai' => $pegawai]);
    }

    public function update($nip, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$nip.',nip',
            'unit' => 'required|in:ACR,Consumer,FTRM,RBC,Risk,SME,Operasional',
            'no_telepon' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'nip' => $request->nip,
            'unit' => $request->unit,
            'no_telepon' => $request->no_telepon,
        ];

        User::where('nip', $nip)->update($data);
        Pegawai::where('nip', $nip)->update($data);

        User::where('nip', $nip)->update(['role' => $request->role]);
        if ($request->role == '1') {
            $pegawai = Pegawai::where('nip', $nip)->first();

            $adminData = $pegawai->toArray();
            $adminData['role'] = $request->role;
            Admin::create($adminData);

            $pegawai->delete();
        }

        return redirect()->route('pegawai')->with('success', 'User edited successfully');
    }
    

    public function hapus($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->first();
        $user = User::where('nip', $nip)->first();

        if (!$pegawai && !$user) {
            return redirect()->back()->with('error', 'Data pegawai tidak ditemukan');
        }

        $pegawai->delete();
        $user->delete();

        return redirect()->route('pegawai')->with('success', 'Data pegawai berhasil dihapus');
    }
}
