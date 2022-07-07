@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      
                    <form action="{{ route('tindakan.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('pas') is-invalid @enderror" name="pas" value="{{ old('pas',$data->pas) }}" placeholder="Masukkan Nama">
                        
                            <!-- error message untuk title -->
                            @error('pas')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Tindakan</label>
                            <input type="text" class="form-control @error('tdk') is-invalid @enderror" name="tdk" value="{{ old('tdk',$data->tdk) }}" placeholder="Masukkan Jabatab">
                        
                            <!-- error message untuk title -->
                            @error('tdk')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Tanggal</label>
                            <input type="date" class="form-control @error('wak') is-invalid @enderror" name="wak" value="{{ old('wak',$data->wak) }}" placeholder="Masukkan nilai">
                        
                            <!-- error message untuk title -->
                            @error('wak')
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