<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PengirimanSurat;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class PengirimanSuratController extends Controller
{

    //---ADMIN--//
    public function listPengirimanSurat(Request $request)
    {
        $pengirimanSurat = PengirimanSurat::all();

        return view('admin.listDeliverySurat', ['dataPengirimanSurat' => $pengirimanSurat]);
    }


    public function buat($no_surat)
    {
        $suratpengiriman = SuratKeluar::where('no_surat', $no_surat)->first();

        return view('admin.addPengirimanSurat', ['suratpengiriman' => $suratpengiriman]);
    }


    public function tambahPengiriman($no_surat, Request $request)
    {
        $suratKeluar = SuratKeluar::where('no_surat', $no_surat)->first();
        $validator = Validator::make($request->all(), [
            'jenis_pengiriman' => 'required|in:ekspedisi,lokasi',
            'penerima' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($suratKeluar) {
            $suratKeluar->update([
                'status' => 1,
            ]);
        }
        // Simpan file foto ke storage
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('public/img'); // Simpan file ke storage di direktori 'public/images'
        }

        $data = [
            'tgl_pengiriman' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'jenis_pengiriman' => $request->jenis_pengiriman,
            'ekspedisi' => $request->ekspedisi,
            'penerima' => $request->penerima,
            'status' => $request->status ?? 2,
            'pengirim' => $suratKeluar->pengirim,
            'bukti_foto' => $filePath, // Simpan path foto ke dalam kolom 'bukti_foto'
        ];

        // Buat entri baru di database
        PengirimanSurat::create($data);

        return redirect()->route('listDeliverySurat')->with('success', 'Mails added successfully');
        // Redirect atau berikan respons yang sesuai
    }


    //---PEGAWAI--//
    public function pengirimanSurat(Request $request)
    {
        $user = Auth::user();

        // Ambil semua pengiriman surat yang memiliki pengirim sesuai dengan user saat ini
        $suratKeluar = SuratKeluar::where('pengirim', $user->name)->get();

        $pengirimanSurat = collect();

        foreach ($suratKeluar as $surat) {
            // Ubah query untuk hanya mengambil pengiriman surat yang terkait dengan surat keluar milik pengguna saat ini
            $pengirimanSurat = $pengirimanSurat->merge($surat->pengirimanSurat()->where('pengirim', $user->name)->get());
        }

        return view('pegawai.deliverySurat', ['dataPengirimanSurat' => $pengirimanSurat]);
    }


    public function tambah($no_surat)
    {
        $suratpengiriman = SuratKeluar::where('no_surat', $no_surat)->first();

        return view('pegawai.addPengirimanSurat', ['suratpengiriman' => $suratpengiriman]);
    }


    public function buatPengiriman($no_surat, Request $request)
    {
        $suratKeluar = SuratKeluar::where('no_surat', $no_surat)->first();

        $validator = Validator::make($request->all(), [
            'jenis_pengiriman' => 'required|in:ekspedisi,lokasi',
            'penerima' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Simpan file foto ke storage
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filePath = $file->store('public/img'); // Simpan file ke storage di direktori 'public/images'
        }

        if ($suratKeluar) {
            $suratKeluar->update([
                'status' => 2,
            ]);
        }
        $data = [
            'tgl_pengiriman' => Carbon::now()->toDateString(),
            'no_surat' => $request->no_surat,
            'jenis' => $request->jenis,
            'perihal' => $request->perihal,
            'dari' => $request->dari,
            'tertuju' => $request->tertuju,
            'jenis_pengiriman' => $request->jenis_pengiriman,
            'ekspedisi' => $request->ekspedisi,
            'penerima' => $request->penerima,
            'status' => $request->status ?? 2,
            'bukti_foto' => $filePath,
            'pengirim' => $suratKeluar->pengirim,
        ];

        // Buat entri baru di database
        PengirimanSurat::create($data);

        return redirect()->route('deliverySurat')->with('success', 'Mails added successfully');
    }
}