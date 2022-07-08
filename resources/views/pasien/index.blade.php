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
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Penyakit</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Tanggal Lahir</th>
                                    <th scope="col">Tanggal Masuk</th>
                                    <th scope="col">Telepon</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <td>{{ $d->nama }}</td>
                                        <td>{{ $d->pyt }}</td>
                                        <td>{{ $d->alt }}</td>
                                        <td>{{ $d->tgl_l }}</td>
                                        <td>{{ $d->tgl_m }}</td>
                                        <td>{{ $d->tlp }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('pasien.edit', $d->id) }}" >
                                                    <i class="fas fa-pencil-alt">
                                                    </i>

                                                </a>


                                            <form action="{{ route('pasien.destroy', $d->id) }}" method="POST"
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
                    <form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="font-weight-bold">NAMA</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama"
                                value="{{ old('nama') }}" placeholder="Masukkan Nama">

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
                                value="{{ old('pyt') }}" placeholder="Masukkan Jabatab">

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
                                value="{{ old('alt') }}" placeholder="Masukkan nilai">

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
                                value="{{ old('tgl_l') }}" placeholder="Masukkan Jabatab">

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
                                value="{{ old('tgl_m') }}" placeholder="Masukkan Jabatab">

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
                                value="{{ old('tlp') }}" placeholder="Masukkan Jabatab">

                            <!-- error message untuk title -->
                            @error('tlp')
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
