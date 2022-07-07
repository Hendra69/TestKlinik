@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      
                    <form action="{{ route('pegawai.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama',$data->nama) }}" placeholder="Masukkan Nama">
                        
                            <!-- error message untuk title -->
                            @error('nama')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Alamat</label>
                            <input type="text" class="form-control @error('alt') is-invalid @enderror" name="alt" value="{{ old('alt',$data->alt) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('alt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Telepon</label>
                            <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="tlp" value="{{ old('tlp',$data->tlp) }}" placeholder="Masukkan nilai">
                        
                            <!-- error message untuk title -->
                            @error('tlp')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Kelamin</label>
                            <input type="text" class="form-control @error('jk') is-invalid @enderror" name="jk" value="{{ old('jk',$data->jk) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('jk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal Lahir</label>
                            <input type="text" class="form-control @error('tgl') is-invalid @enderror" name="tgl" value="{{ old('tgl',$data->tgl) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('tgl')
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