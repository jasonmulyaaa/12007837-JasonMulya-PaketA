<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Logging;
use Illuminate\Http\Request;
use Hash;
use Auth;

class UsermanagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usermanagements = Petugas::where('level', 'petugas')->paginate(5);

        $usermanagements = Petugas::when($request->search, function ($query) use ($request) {
            $query->where('nama_petugas', 'like', "%{$request->search}%")->orwhere('username', 'like', "%{$request->search}%")->orwhere('telp', 'like', "%{$request->search}%");
        })->where('level', 'petugas')->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.usermanagement.index', compact('usermanagements'));
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
            'nama_petugas' => 'required|max:35',
            'username' => 'required|max:25',
            'password' => 'required',
            'telp' => 'required|max:13',
            'level' => 'required',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'level' => $request->level,
        ]);

        Logging::create([
            'table' => 'petugas',
            'nama' => Auth::guard('petugas')->user()->nama_petugas,
            'username' => Auth::guard('petugas')->user()->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => Auth::guard('petugas')->user()->level,
            'status' => 'insert',
        ]);

        return redirect()->route('usermanagement.index')->with('toast_success', 'Data Berhasil Disimpan!');
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
        $usermanagement = Petugas::find($id);
        return view('admin.usermanagement.edit', compact('usermanagement'));

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
        $rules = ([
            'nama_petugas' => 'required',
            'telp' => 'required',
            'username' => 'required',
            'level' => 'required',
            'password',
        ]);

        $validate = $request->validate($rules);

        if($request['password'] == '')
        {
         $request['password'] == $request['oldPass'];
        }
        else{
         $validate['password'] == bcrypt($request['password']);
        }

        $usermanagement = Petugas::find($id);
        $usermanagement->update($validate);

        Logging::create([
            'table' => 'petugas',
            'nama' => Auth::guard('petugas')->user()->nama_petugas,
            'username' => Auth::guard('petugas')->user()->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => Auth::guard('petugas')->user()->level,
            'status' => 'update',
        ]);

        return redirect()->route('usermanagement.index')->with('toast_success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();

        Logging::create([
            'table' => 'petugas',
            'nama' => Auth::guard('petugas')->user()->nama_petugas,
            'username' => Auth::guard('petugas')->user()->username,
            'tgl_aksi' => date('Y-m-d'),
            'level' => Auth::guard('petugas')->user()->level,
            'status' => 'delete',
        ]);

        return redirect()->route('usermanagement.index')->with('toast_success', 'Data Berhasil Dihapus!');
    }
}
