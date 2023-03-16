<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Logging;
use Illuminate\Http\Request;
use Hash;
use Auth;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.register.index');
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
            'username' => 'required|max:25|unique:masyarakat',
            'password' => 'required',
            'nik' => 'required|max:16|unique:masyarakat',
            'nama' => 'required|max:35',
            'telp' => 'required|max:13',
            'rt' => 'required|max:11',
            'rw' => 'required|max:11',
        ]);

        Masyarakat::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'nik' => $request->nik,
            'nama' => $request->nama,
            'telp' => $request->telp,
            'rt' => $request->rt,
            'rw' => $request->rw,
        ]);

        Logging::create([
            'table' => 'masyarakat',
            'nama' => $request->nama,
            'username' => $request->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => 'masyarakat',
            'status' => 'insert',
        ]);


        return back()->with('success', 'Akun Anda Berhasil Ditambahkan! Silahkan Login!');
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
