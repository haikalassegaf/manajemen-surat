<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    public function listSuratKeluar(Request $request)
    {
        $suratkeluar = SuratKeluar::all();
        $statusUrut = SuratKeluar::orderBy('status', 'asc')->get();

        return view('admin.listSuratKeluar', ['dataSuratKeluar' => $suratkeluar, 'urutSuratKeluar' => $statusUrut]);
    }

    public function create()
    {
        $user = User::all();

        return view('admin.addSuratKeluar', ['user' => $user]);
    }
    public function addSuratKeluar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required|in:Memo,Nota,Surat',
            'no_surat' => 'required|unique:surat_keluar,no_surat',
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_input_surat' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'status' => $request->status ?? 0,
        ];

        SuratKeluar::create($data);

        return redirect()->route('listSuratKeluar')->with('success', 'Mails added successfully');
    }

    public function edit($no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->first();

        return view('admin.editSuratKeluar', ['suratkeluar' => $suratkeluar]);
    }

    public function update($no_surat, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_input_surat' => $request->tgl_input_surat,
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'status' => $request->status ?? 0,
        ];
        SuratKeluar::where('no_surat', $no_surat)->update($data);

        return redirect()->route('listSuratKeluar')->with('success', 'Mails edited successfully');
    }

    public function hapus($no_surat)
    {
        // Change 'id' to 'no_surat' in the where clause
        $deletesurat = SuratKeluar::where('no_surat', $no_surat)->first();

        // Periksa apakah data ditemukan
        if (!$deletesurat) {
            return redirect()->back()->with('error', 'Data surat masuk tidak ditemukan');
        }

        // Hapus data surat masuk
        $deletesurat->delete();

        return redirect()->route('listSuratKeluar')->with('success', 'Data surat masuk berhasil dihapus');
    }

    public function suratKeluar(Request $request)
    {
        $user = Auth::user();
        $suratkeluar = SuratKeluar::where('pengirim', $user->name)->get();
        $statusUrut = SuratKeluar::orderBy('status', 'asc')->get();

        return view('pegawai.listSuratKeluar', ['dataSuratKeluar' => $suratkeluar, $statusUrut]);
    }

    public function buat()
    {
        $user = User::all();

        return view('pegawai.addSuratKeluar', ['user' => $user]);
    }

    public function tambahSuratKeluar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required|in:Memo,Nota,Surat',
            'no_surat' => 'required|unique:surat_keluar,no_surat',
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_input_surat' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'status' => $request->status ?? 0,
        ];

        SuratKeluar::create($data);

        return redirect()->route('pegawai.listSuratKeluar')->with('success', 'Mails added successfully');
    }

    public function ubah($no_surat)
    {
        $suratkeluar = SuratKeluar::where('no_surat', $no_surat)->first();

        return view('pegawai.editSuratKeluar', ['suratkeluar' => $suratkeluar]);
    }

    public function simpan($no_surat, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_input_surat' => $request->tgl_input_surat,
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'pengirim' => $request->pengirim,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'status' => $request->status ?? 0,
        ];
        SuratKeluar::where('no_surat', $no_surat)->update($data);

        return redirect()->route('pegawai.listSuratKeluar')->with('success', 'Mails edited successfully');
    }

    public function delete($no_surat)
    {
        $deletesuratkeluar = SuratKeluar::where('no_surat', $no_surat)->first();

        if (!$deletesuratkeluar) {
            return redirect()->back()->with('error', 'Data surat masuk tidak ditemukan');
        }

        $deletesuratkeluar->delete();

        return redirect()->route('pegawai.listSuratKeluar')->with('success', 'Data surat masuk berhasil dihapus');
    }
}