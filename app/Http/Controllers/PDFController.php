<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;
use PDF;
use Auth;

class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pdf.index');
    }

    public function generatepdf(Request $request)
    {
            $generatepdfs= Pengaduan::where('tgl_pengaduan', $request->awal)->Orwhere('tgl_pengaduan', $request->akhir)->get();

            $petugas = Petugas::select('rt', 'rw')->distinct()->get();
            $rekap = Pengaduan::where('id_petugas', Auth::guard('petugas')->user()->id_petugas)->where('rt', Auth::guard('petugas')->user()->rt)->where('rw', Auth::guard('petugas')->user()->rw)->count();
            
            $pdf = PDF::loadview('admin.pdf.pdf', compact('generatepdfs', 'rekap', 'petugas'));

            $pdf->setPaper('A4', 'potrait');

            return $pdf->download('Laporan Pengaduan Masyarakat Tegallega.pdf');
    }
}
