<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Pegawai::all();
        return view('pegawai/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pegawai/index',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama'      => 'required',
            'alt'       =>'required',
            'tlp'       => 'required',
            'jk'        => 'required',
            'tgl'       =>'required',
           ]);

           Pegawai::create([
            'nama'      => $request->nama,
            'alt'       => $request->alt,
            'tlp'       => $request->tlp,
            'jk'        => $request->jk,
            'tgl'       => $request->tgl,

        ]);
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
        
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
        $data = Pegawai::find($id);
      
        return view('pegawai.edit',compact(['data']));
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
        $request->validate([
            'nama'      => 'required',
            'alt'       =>'required',
            'tlp'       => 'required',
            'jk'        => 'required',
            'tgl'       =>'required',
           ]);
           $data= Pegawai::findOrFail($id);
           $data->update($request->except((['_token','submit'])));
           return redirect('/pegawai')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil DiDelete!']);
        
    }
}
