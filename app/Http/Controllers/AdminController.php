<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function listAkunAdmin(Request $request)
    {
        $akunadmin = Admin::all();
        return view('admin.adminAccount', ['dataAdmin' => $akunadmin]);
    }

    public function create()
    {
        return view('admin.addAkunAdmin');
    }

    public function addadmin(Request $request)
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
        $data->role = '1';

        $data->save();

        if ($data->role == 1) {
            Admin::create([
                'name' => $data->name,
                'email' => $data->email,
                'password' => $data->password,
                'nip' => $data->nip,
                'unit' => $data->unit,
                'no_telepon' => $data->no_telepon,
            ]);
        }

        return redirect()->route('admin')->with('success', 'User added successfully');
    }

    public function edit($nip)
    {
        $admin = Admin::where('nip', $nip)->first();

        return view('admin.editAkunAdmin', ['admin' => $admin]);
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
        Admin::where('nip', $nip)->update($data);

        User::where('nip', $nip)->update(['role' => $request->role]);
        if ($request->role == '0') {
            $admin = Admin::where('nip', $nip)->first();

            $pegawaiData = $admin->toArray();
            $pegawaiData['role'] = $request->role;
            Pegawai::create($pegawaiData);

            $admin->delete();
        }

        return redirect()->route('admin')->with('success', 'User edited successfully');
    }

    public function hapus($nip)
    {
        $admin = Admin::where('nip', $nip)->first();
        $user = User::where('nip', $nip)->first();

        if (!$admin && !$user) {
            return redirect()->back()->with('error', 'Data admin tidak ditemukan');
        }

        $admin->delete();
        $user->delete();

        return redirect()->route('admin')->with('success', 'Data admin berhasil dihapus');
    }
}
