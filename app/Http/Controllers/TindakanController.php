<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data  = Tindakan::all();
        return view('tindakan/index',compact('data'));
    }
  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tindakan/index',compact('data'));
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
            'pas'      => 'required',
            'tdk'       =>'required',
            'wak'       => 'required',
            
           ]);

           Tindakan::create([
            'pas'      => $request->pas,
            'tdk'       => $request->tdk,
            'wak'       => $request->wak,
           

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
        $data = Tindakan::find($id);
      
        return view('tindakan.edit',compact(['data']));
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
            'pas'      => 'required',
            'tdk'       =>'required',
            'wak'       => 'required',
           ]);
           $data= Tindakan::findOrFail($id);
           $data->update($request->except((['_token','submit'])));
           return redirect('/tindakan')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Tindakan::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil DiDelete!']);
    }
}
