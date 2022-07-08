@extends('layouts.master')
@section('content')
@section('h1','Data Wilayah')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                               Create
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Kota</th>
                                            <th scope="col">Kecamatan</th>
                                            <th scope="col">Kabupaten</th>
                                            <th scope="col">Nama Jalan</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->kota }}</td>
                                            <td>{{ $d->kc }}</td>
                                            <td>{{ $d->kb }}</td>
                                            <td>{{ $d->dh }}</td>
                                            <td>
                                                <a class="btn btn-info btn-sm"
                                                        href="{{ route('wilayah.edit', $d->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>

                                                    </a>

                                                <form action="{{ route('wilayah.destroy', $d->id) }}" method="POST"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" style="display:contents !important;">
                                                    
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('wilayah.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Kota</label>
                                <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota"
                                    value="{{ old('kota') }}" placeholder="Masukkan Kota">

                                <!-- error message untuk title -->
                                @error('kota')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Kecamatan</label>
                                <input type="text" class="form-control @error('kc') is-invalid @enderror" name="kc"
                                    value="{{ old('kc') }}" placeholder="Masukkan Kecamatan">

                                <!-- error message untuk title -->
                                @error('kc')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Kabupaten</label>
                                <input type="text" class="form-control @error('kb') is-invalid @enderror" name="kb"
                                    value="{{ old('kb') }}" placeholder="Masukkan Kabupaten">

                                <!-- error message untuk title -->
                                @error('kb')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Nama Jalan </label>
                                <input type="text" class="form-control @error('dh') is-invalid @enderror" name="dh"
                                    value="{{ old('dh') }}" placeholder="Masukkan Nama Jalan">

                                <!-- error message untuk title -->
                                @error('dh')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
