@extends('layouts.master')
@section('content')
@section('h1','Data Pegawai')
    <section class="content">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                                Create
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Telepon</th>
                                            <th scope="col">Jenis Kelamin</th>
                                            <th scope="col">Tanggal Lahir</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->alt }}</td>
                                            <td>{{ $d->tlp }}</td>
                                            <td>{{ $d->jk }}</td>
                                            <td>{{ $d->tgl }}</td>
                                            <td>
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('pegawai.edit', $d->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>

                                                    </a>
                                                <form action="{{ route('pegawai.destroy', $d->id) }}" method="POST"
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
                        <h5 class="modal-title" id="exampleModalLabel">Create Pegawai</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pegawai.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label class="font-weight-bold">Alamat</label>
                                <input type="text" class="form-control @error('alt') is-invalid @enderror" name="alt"
                                    value="{{ old('alt') }}" placeholder="Masukkan Alamat">

                                <!-- error message untuk title -->
                                @error('alt')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Telepon</label>
                                <input type="number" class="form-control @error('tlp') is-invalid @enderror" name="tlp"
                                    value="{{ old('tlp') }}" placeholder="Masukkan Telepon">

                                <!-- error message untuk title -->
                                @error('tlp')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check form-check-inline">
                        <label for="jk">
                            <input type="radio" name="jk" value="Laki-Laki" id="jk">Laki-Laki
                            <input type="radio" name="jk" value="Perempuan" id="jk" selected>Perempuan
                        </label>
                        </div>
                            </div>
                           
                   

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal Lahir</label>
                                <input type="date" class="form-control @error('tgl') is-invalid @enderror" name="tgl"
                                    value="{{ old('tgl') }}" placeholder="Masukkan Jabatab">

                                <!-- error message untuk title -->
                                @error('tgl')
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
