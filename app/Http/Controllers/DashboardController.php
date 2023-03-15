<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Auth;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guard('masyarakat')->check()) {
            $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->count();
            $pengaduan_belumverifikasi = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->where('status', '0')->count();
            $pengaduan_proses = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->where('status', 'proses')->count();
            $pengaduan_selesai = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->where('status', 'selesai')->count();
        }
        else{
            $pengaduan = Pengaduan::count();
            $pengaduan_belumverifikasi = Pengaduan::where('status', '0')->count();
            $pengaduan_proses = Pengaduan::where('status', 'proses')->count();
            $pengaduan_selesai = Pengaduan::where('status', 'selesai')->count();
        }

        return view('dashboard', compact('pengaduan', 'pengaduan_belumverifikasi', 'pengaduan_proses', 'pengaduan_selesai'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
