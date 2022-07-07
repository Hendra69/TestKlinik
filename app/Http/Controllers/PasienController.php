<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Pasien::all();
        return view('pasien/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pasien/index',compact('data'));
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
            'pyt'       =>'required',
            'alt'       => 'required',
            'tgl_l'        => 'required',
            'tgl_m'       =>'required',
            'tlp'       =>'required',
           ]);

           Pasien::create([
            'nama'      => $request->nama,
            'pyt'       => $request->pyt,
            'alt'       => $request->alt,
            'tgl_l'        => $request->tgl_l,
            'tgl_m'       => $request->tgl_m,
            'tlp'       => $request->tlp,


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
        $data = Pasien::find($id);
      
        return view('pasien.edit',compact(['data']));
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
            'pyt'       =>'required',
            'alt'       => 'required',
            'tgl_l'      => 'required',
            'tgl_m'       =>'required',
            'tlp'       => 'required',
           ]);
           $data= Pasien::findOrFail($id);
           $data->update($request->except((['_token','submit'])));
           return redirect('/pasien')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Pasien::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil DiDelete!']);
    }
}
