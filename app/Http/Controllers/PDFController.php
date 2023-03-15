<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use PDF;

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

            $pdf = PDF::loadview('admin.pdf.pdf', compact('generatepdfs'));

            $pdf->setPaper('A4', 'potrait');

            return $pdf->download('pdf_file.pdf');
    }
}
