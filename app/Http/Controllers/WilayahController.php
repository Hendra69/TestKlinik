<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Wilayah::all();
        return view('wilayah/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('wilayah/index',compact('data'));
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
            'kota'      => 'required',
            'kc'       =>'required',
            'kb'       => 'required',
            'dh'        => 'required',
           
           ]);

           Wilayah::create([
            'kota'      => $request->kota,
            'kc'       => $request->kc,
            'kb'       => $request->kb,
            'dh'        => $request->dh,
           

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
        $data = Wilayah::find($id);
      
        return view('wilayah.edit',compact(['data']));
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
            'kota'      => 'required',
            'kc'       => 'required',
            'kb'       => 'required',
            'dh'        => 'required',
           ]);
           $data= Wilayah::findOrFail($id);
           $data->update($request->except((['_token','submit'])));
           return redirect('/wilayah')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Wilayah::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil DiDelete!']);
    }
}
