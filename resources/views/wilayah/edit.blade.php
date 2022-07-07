@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      
                    <form action="{{ route('wilayah.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <label class="font-weight-bold">Kota</label>
                            <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" value="{{ old('kota',$data->kota) }}" placeholder="Masukkan Nama">
                        
                            <!-- error message untuk title -->
                            @error('kota')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Kecamatan</label>
                            <input type="text" class="form-control @error('kc') is-invalid @enderror" name="kc" value="{{ old('kc',$data->kc) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('kc')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Kabupaten</label>
                            <input type="text" class="form-control @error('kb') is-invalid @enderror" name="kb" value="{{ old('kb',$data->kb) }}" placeholder="Masukkan nilai">
                        
                            <!-- error message untuk title -->
                            @error('kb')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Nama Jalan </label>
                            <input type="text" class="form-control @error('dh') is-invalid @enderror" name="dh" value="{{ old('dh',$data->dh) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('dh')
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