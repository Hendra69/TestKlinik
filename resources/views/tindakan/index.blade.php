@extends('layouts.master')
@section('content')
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
                                            <th scope="col">Nama Pasien</th>
                                            <th scope="col">Jenis Tindakan</th>
                                            <th scope="col">Tanggal&Waktu</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->pas }}</td>
                                            <td>{{ $d->tdk }}</td>
                                            <td>{{ $d->wak }}</td>
                                            <td>

                                                <form action="{{ route('tindakan.destroy', $d->id) }}" method="POST"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('tindakan.edit', $d->id) }}">
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
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('tindakan.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <input type="text" class="form-control @error('pas') is-invalid @enderror" name="pas"
                                    value="{{ old('pas') }}" placeholder="Masukkan Nama">

                                <!-- error message untuk title -->
                                @error('pas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tindakan</label>
                                <input type="text" class="form-control @error('tdk') is-invalid @enderror" name="tdk"
                                    value="{{ old('tdk') }}" placeholder="Masukkan Jabatab">

                                <!-- error message untuk title -->
                                @error('tdk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal</label>
                                <input type="date" class="form-control @error('wak') is-invalid @enderror" name="wak"
                                    value="{{ old('wak') }}" placeholder="Masukkan nilai">

                                <!-- error message untuk title -->
                                @error('wak')
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
