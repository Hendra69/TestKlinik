<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Tindakan;
use App\Models\Pasien;
use App\Models\Obat;
use DB;
class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data= Transaksi::all();
        $data2 = Pasien::pluck('nama', 'id');
        $data3 = Obat::pluck('obt', 'id');
        $data4 = Tindakan::pluck('tdk', 'id');
       return view('transaksi/tindakan',compact('data','data2','data3','data4'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('transaksi/tindakan',compact('data','data2','data3','data4'));
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
            'ps'      => 'required',
            'tdk'       =>'required',
            'obt'       =>'required',
            'wk'       => 'required',
            
           ]);

           Transaksi::create([
            'ps'      => $request->ps,
            'tdk'       => $request->tdk,
            'obt'       => $request->obt,
            'wk'       => $request->wk,
           

        ]);
        
        return redirect()->back()->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data2 = Pasien::pluck('nama', 'id');
        $data3 = Obat::pluck('obt', 'id');
        $data4 = Tindakan::pluck('tdk', 'id');
        $a = DB::select("select a.ps, b.tdk , c.hrg from test.transaksis a ,test.tindakans b , test.obats c where a.tdk = b.tdk and a.obt = c.obt");
        return view('transaksi/bayar',compact('data2','data3','data4','a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Transaksi::find($id);
        $data2 = Pasien::pluck('nama', 'id');
        $data3 = Obat::pluck('obt', 'id');
        $data4 = Tindakan::pluck('tdk', 'id');
        
        return view('transaksi.edit',compact('data','data2','data3','data4'));
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
            'ps'      => 'required',
            'tdk'       =>'required',
            'obt'       =>'required',
            'wk'       => 'required',
           ]);
           $data= Transaksi::findOrFail($id);
           $data->update($request->except((['_token','submit'])));
           return redirect('/transaksi')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Transaksi::findOrFail($id);
        $data->delete();
        return redirect()->back()->with(['success' => 'Data Berhasil DiDelete!']);
    }
    
}
