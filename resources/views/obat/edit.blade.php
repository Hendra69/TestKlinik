@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      
                    <form action="{{ route('obat.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <label class="font-weight-bold">NAMA Obat</label>
                            <input type="text" class="form-control @error('obt') is-invalid @enderror" name="obt" value="{{ old('obt',$data->obt) }}" placeholder="Masukkan Nama">
                        
                            <!-- error message untuk title -->
                            @error('obt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Obat</label>
                            <input type="text" class="form-control @error('jn') is-invalid @enderror" name="jn" value="{{ old('jn',$data->jn) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('jn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Stock</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok" value="{{ old('stok',$data->stok) }}" placeholder="Masukkan nilai">
                        
                            <!-- error message untuk title -->
                            @error('stok')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Harga</label>
                            <input type="text" class="form-control @error('hrg') is-invalid @enderror" name="hrg"
                                value="{{ old('hrg',$data->hrg) }}" placeholder="Masukkan Harga">

                            <!-- error message untuk title -->
                            @error('hrg')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                            <button type="submit" class="btn btn-md btn-primary">UPDATE</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection