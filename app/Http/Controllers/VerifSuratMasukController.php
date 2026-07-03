<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class VerifSuratMasukController extends Controller
{
    public function listVerifSuratMasuk(Request $request)
    {
        $verifSuratMasuk = SuratMasuk::orderBy('status', 'asc')->get();

        // $verifSuratMasuk = SuratMasuk::where('status', '0')->get();

        return view('admin.listVerifSuratMasuk', ['verifSuratMasuk' => $verifSuratMasuk]);
    }

    public function verifikasi(Request $request)
    {
        // $data = [
        //     'keterangan' => $request->keterangan,
        // ];

        // SuratMasuk::create($data);

        try {
            $verifsuratmasuk = SuratMasuk::where('no_surat', $request->no_surat)->first();

            if ($verifsuratmasuk) {
                $verifsuratmasuk->update([
                    'status' => 1,
                    'keterangan' => $request->keterangan,
                ]);

                return redirect()->back()->with('success', 'Surat Masuk approved successfully!');

            } else {
                return redirect()->back()->with('error', 'Surat Masuk not found. Please try again.');
            }
        } catch (\Exception $e) {
            \Log::error('Error approving data: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Failed to approve Surat Masuk. Please try again.');
        }
    }
}
