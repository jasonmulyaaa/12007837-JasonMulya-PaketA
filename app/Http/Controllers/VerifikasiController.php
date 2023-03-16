<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Logging;
use Illuminate\Http\Request;
use Auth;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $verifikasis = Pengaduan::where('status', '0')->paginate(5);

        $verifikasis = Pengaduan::when($request->search, function ($query) use ($request) {
            $query->where('isi_laporan', 'like', "%{$request->search}%")->orwhere('nik', 'like', "%{$request->search}%");
        })->where('rt', Auth::guard('petugas')->user()->rt)->where('rw', Auth::guard('petugas')->user()->rw)->where('status', '0')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.verifikasi.index', compact('verifikasis'));
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
        $validate = $request->validate([
            'tanggapan' => 'required',
            'id_pengaduan' => 'required',
        ]);

        Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tgl_tanggapan' => date('Y-m-d'),
            'tanggapan' => $request->tanggapan,
            'id_petugas' => Auth::guard('petugas')->user()->id_petugas,
        ]);

        Logging::create([
            'table' => 'pengaduan',
            'nama' => Auth::guard('petugas')->user()->nama_petugas,
            'username' => Auth::guard('petugas')->user()->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => Auth::guard('petugas')->user()->level,
            'status' => 'update',
        ]);

        $verifikasi = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();
        $verifikasi->status = 'proses';
        $verifikasi->id_petugas = Auth::guard('petugas')->user()->id_petugas;
        $verifikasi->update();

        return redirect()->intended('validasi')->with('toast_success', 'Data Pengaduan Berhasil Diproses!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $verifikasi = Pengaduan::findorFail($id);
        $nama = Masyarakat::where('nik', $verifikasi->nik)->first();
        return view('admin.verifikasi.show', compact('verifikasi', 'nama'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $verifikasi = Pengaduan::findorFail($id);
        $nama = Masyarakat::where('nik', $verifikasi->nik)->first();
        return view('admin.verifikasi.edit', compact('verifikasi', 'nama'));
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
        $verifikasi = Pengaduan::find($id);
        $verifikasi->status = 'ditolak';
        $verifikasi->update();

        return back()->with('toast_success', 'Data Pengaduan Berhasil Ditolak!');
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
