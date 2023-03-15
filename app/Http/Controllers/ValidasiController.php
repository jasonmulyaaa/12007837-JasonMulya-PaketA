<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Logging;
use Illuminate\Http\Request;
use Auth;

class ValidasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $validasis = Pengaduan::where('status', 'proses')->orwhere('status', 'selesai')->paginate(5);

        $validasis = Pengaduan::when($request->search, function ($query) use ($request) {
            $query->where('isi_laporan', 'like', "%{$request->search}%")->orwhere('nik', 'like', "%{$request->search}%");
        })->where('status', 'proses')->orwhere('status', 'selesai')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.validasi.index', compact('validasis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $validasi = Pengaduan::findorFail($id);
        $nama = Masyarakat::where('nik', $validasi->nik)->first();
        return view('admin.validasi.show', compact('validasi', 'nama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $validasi = Pengaduan::findorFail($id);
        $nama = Masyarakat::where('nik', $validasi->nik)->first();
        return view('admin.validasi.edit', compact('validasi', 'nama'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'tanggapan' => 'required',
            'id_pengaduan' => 'required',
        ]);

        $tanggapan = Tanggapan::where('id_pengaduan', $id)->first();
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->update();

        $verifikasi = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $verifikasi->status = 'selesai';
        $verifikasi->update();

        Logging::create([
            'table' => 'pengaduan',
            'nama' => Auth::guard('petugas')->user()->nama_petugas,
            'username' => Auth::guard('petugas')->user()->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => Auth::guard('petugas')->user()->level,
            'status' => 'update',
        ]);

        return redirect()->route('validasi.index')->with('toast_success', 'Data Pengaduan Berhasil Diselesaikan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
