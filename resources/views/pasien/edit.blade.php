@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">

                        <form action="{{ route('pasien.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                    value="{{ old('nama', $data->nama) }}" placeholder="Masukkan Nama">

                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Penyakit</label>
                                <input type="text" class="form-control @error('pyt') is-invalid @enderror" name="pyt"
                                    value="{{ old('pyt', $data->pyt) }}" placeholder="Masukkan Penyakit">

                                <!-- error message untuk title -->
                                @error('pyt')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alt') is-invalid @enderror" name="alt"
                                    value="{{ old('alt', $data->alt) }}" placeholder="Masukkan Alamat">

                                <!-- error message untuk title -->
                                @error('alt')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl_l') is-invalid @enderror" name="tgl_l"
                                    value="{{ old('tgl_l', $data->tgl_l) }}" placeholder="Masukkan Tanggal Lahir">

                                <!-- error message untuk title -->
                                @error('tgl_l')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Masuk</label>
                                <input type="date" class="form-control @error('tgl_m') is-invalid @enderror" name="tgl_m"
                                    value="{{ old('tgl_m', $data->tgl_m) }}" placeholder="Masukkan Tanggal Masuk">

                                <!-- error message untuk title -->
                                @error('tgl')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="text" class="form-control @error('tlp') is-invalid @enderror" name="tlp"
                                    value="{{ old('tlp', $data->tlp) }}" placeholder="Masukkan No Tekepon">

                                <!-- error message untuk title -->
                                @error('tlp')
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
