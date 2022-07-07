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
                                            <th scope="col">Obat</th>
                                            <th scope="col">Tanggal&Waktu</th>
                                            <th scope="col">AKSI</th>
                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                        <tr>
                                            <td>{{ $d->ps }}</td>
                                            <td>{{ $d->tdk }}</td>
                                            <td>{{ $d->obt }}</td>
                                            <td>{{ $d->wk }}</td>
                                            <td><a class="btn btn-info btn-sm"
                                                        href="{{ route('transaksi.edit', $d->id) }}">
                                                        <i class="fas fa-pencil-alt">
                                                        </i>

                                                    </a>

                                            <form action="{{ route('transaksi.destroy', $d->id) }}" method="POST"
                                                    onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" style="display:contents !important;"> 
                                                    
                                                    
                                                    @method('delete')
                                                    @csrf
                                                    <input type="hidden" value="DELETE">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash">
                                                        </i>
                                                    </button>
                                                    
                                                </form>
                                                <a class="btn btn-info btn-sm"
                                                        href="{{ route('transaksi.show', $d->id) }}">
                                                        Tagihan
                                                        </i>

                                                    </a>

                                            </td>


                                        </tr>
                                    @endforeach
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
                        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <select class="form-control" name="ps">
                                    <option>Select Item</option>
                                    @foreach ($data2 as $key => $value)
                                        <option value="{{ $value }}" {{ $key == $value ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Tindakan</label>
                                <select class="form-control" name="tdk">
                                    <option>Select Item</option>
                                    @foreach ($data4 as $key => $value)
                                        <option value="{{ $value }}" {{ $key == $value ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Obat</label>
                                <select class="form-control" name="obt">
                                    <option>Select Item</option>
                                    @foreach ($data3 as $key => $value)
                                        <option value="{{ $value }}" {{ $key == $value ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal </label>
                                <input type="date" class="form-control @error('wk') is-invalid @enderror" name="wk"
                                    value="" placeholder="Masukkan Tanggal">

                                <!-- error message untuk title -->
                                @error('wk')
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
