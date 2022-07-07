@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Create
                </button>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Jenis Obat</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->obt }}</td>
                                        <td>{{ $d->jn }}</td>
                                        <td>{{ $d->stok }}</td>
                                        <td>{{ $d->hrg }}</td>
                                        <td>

                                            <form action="{{ route('obat.destroy', $d->id) }}" method="POST"
                                                onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                <a class="btn btn-info btn-sm" href="{{ route('obat.edit', $d->id) }}">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>

                                                </a>
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
                    <h5 class="modal-title" id="exampleModalLabel">Create Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Obat</label>
                            <input type="text" class="form-control @error('obt') is-invalid @enderror" name="obt"
                                value="{{ old('obt') }}" placeholder="Masukkan Nama Obat">

                            <!-- error message untuk title -->
                            @error('obt')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="font-weight-bold">Jenis Obat</label>
                            <input type="text" class="form-control @error('jn') is-invalid @enderror" name="jn"
                                value="{{ old('jn') }}" placeholder="Masukkan Jenis Obat">

                            <!-- error message untuk title -->
                            @error('jn')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Stock</label>
                            <input type="number" class="form-control @error('stok') is-invalid @enderror" name="stok"
                                value="{{ old('stok') }}" placeholder="Masukkan Stock">

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
                                value="{{ old('hrg') }}" placeholder="Masukkan Harga">

                            <!-- error message untuk title -->
                            @error('hrg')
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
