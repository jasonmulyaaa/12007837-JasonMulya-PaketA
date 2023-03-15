<?php

namespace App\Http\Controllers;

use App\Models\Logging;
use Illuminate\Http\Request;

class LoggingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loggings = Logging::latest()->paginate(5);

        $loggings = Logging::when($request->search, function ($query) use ($request) {
            $query->where('table', 'like', "%{$request->search}%")->orwhere('nama', 'like', "%{$request->search}%")->orwhere('username', 'like', "%{$request->search}%")->orwhere('level', 'like', "%{$request->search}%")->orwhere('status', 'like', "%{$request->search}%");
        })->orderBy('created_at', 'desc')->paginate(5);

        return view('admin.logging.index', compact('loggings'));
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
