<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class VerifSuratKeluarController extends Controller
{
    public function listVerifSuratKeluar(Request $request){
        $verifSuratKeluar = SuratKeluar::orderBy('status', 'asc')->get();

//         // $verifSuratKeluar = SuratKeluar::where('status', '0')->get();

//         return view('admin.listVerifSuratKeluar', ['verifSuratKeluar' => $verifSuratKeluar]);
//     }

//     public function verifikasi(Request $request)
//     {
//         try {
//             $verifsuratkeluar = SuratKeluar::where('no_surat', $request->no_surat)->first();

//             if ($verifsuratkeluar) {
//                 $verifsuratkeluar->update([
//                     'status' => 1,
//                 ]);

                return redirect()->back()->with('success', 'Surat Keluar approved successfully!');

            } else {
                return redirect()->back()->with('error', 'Surat Keluar not found. Please try again.');
            }
        } catch (\Exception $e) {
            \Log::error('Error approving data: ' . $e->getMessage());

//             return redirect()->back()->with('error', 'Failed to approve Surat Keluar. Please try again.');
//         }
//     }
// }