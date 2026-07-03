<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    public function listSuratMasuk(Request $request)
    {
        $suratmasuk = SuratMasuk::all();

        return view('admin.listSuratMasuk', ['dataSuratMasuk' => $suratmasuk]);
    }

    public function create(Request $request)
    {
        $user = User::all();

        return view('admin.addSuratMasuk', ['user' => $user]);
    }
    public function addSuratMasuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required|in:Memo,Nota,Surat',
            'no_surat' => 'required|unique:surat_masuk,no_surat',
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
            'tgl_pembuatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_surat_masuk' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'status' => $request->status ?? 0,
            'keterangan' => $request->keterangan ?? '-',
        ];

        SuratMasuk::create($data);

        return redirect()->route('listSuratMasuk')->with('success', 'Mails added successfully');
    }


    public function edit($no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->first();

        return view('admin.editSuratMasuk', ['suratmasuk' => $suratmasuk]);
    }

    public function update($no_surat, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
            'tgl_pembuatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_surat_masuk' => $request->tgl_surat_masuk,
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'status' => $request->status ?? 0,
        ];
        SuratMasuk::where('no_surat', $no_surat)->update($data);

        return redirect()->route('listSuratMasuk')->with('success', 'Mails edited successfully');
    }

    public function hapus($no_surat)
    {
        // Change 'id' to 'no_surat' in the where clause
        $deletesurat = SuratMasuk::where('no_surat', $no_surat)->first();

        // Periksa apakah data ditemukan
        if (!$deletesurat) {
            return redirect()->back()->with('error', 'Data surat masuk tidak ditemukan');
        }

        // Hapus data surat masuk
        $deletesurat->delete();

        return redirect()->route('listSuratMasuk')->with('success', 'Data surat masuk berhasil dihapus');
    }


    public function suratMasuk(Request $request)
    {
        $user = Auth::user();
        $suratmasuk = SuratMasuk::where('penerima', $user->name)->get();

        return view('pegawai.listSuratMasuk', ['dataSuratMasuk' => $suratmasuk]);
    }

    public function buat()
    {
        $user = User::all();

        return view('pegawai.addSuratMasuk', ['user' => $user]);
    }

    public function tambahSuratMasuk(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'jenis' => 'required|in:Memo,Nota,Surat',
            'no_surat' => 'required|unique:surat_masuk,no_surat',
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
            'tgl_pembuatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_surat_masuk' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'status' => $request->status ?? 0,
            'keterangan' => $request->keterangan ?? '-',
        ];

        SuratMasuk::create($data);

        return redirect()->route('pegawai.listSuratMasuk')->with('success', 'Mails added successfully');
    }

    public function ubah($no_surat)
    {
        $suratmasuk = SuratMasuk::where('no_surat', $no_surat)->first();

        return view('pegawai.editSuratMasuk', ['suratmasuk' => $suratmasuk]);
    }

    public function simpan($no_surat, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'perihal' => 'required',
            'dari' => 'required',
            'tertuju' => 'required',
            'tgl_pembuatan' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'tgl_surat_masuk' => $request->tgl_surat_masuk,
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'penerima' => $request->penerima,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'tgl_pembuatan' => $request->tgl_pembuatan,
            'status' => $request->status ?? 0,
        ];
        SuratMasuk::where('no_surat', $no_surat)->update($data);

        return redirect()->route('pegawai.listSuratMasuk')->with('success', 'Mails edited successfully');
    }

    public function delete($no_surat)
    {
        $deletesuratmasuk = SuratMasuk::where('no_surat', $no_surat)->first();

        if (!$deletesuratmasuk) {
            return redirect()->back()->with('error', 'Data surat masuk tidak ditemukan');
        }

        $deletesuratmasuk->delete();

        return redirect()->route('pegawai.listSuratMasuk')->with('success', 'Data surat masuk berhasil dihapus');
    }
}
