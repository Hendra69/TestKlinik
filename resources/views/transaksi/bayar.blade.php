@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama Pasien</th>
                                            <th scope="col">Jenis Tindakan</th>
                                            <th scope="col">Harga</th>

                                        </tr>
                                    </thead>
                                <tbody>
                                    @foreach ($a as $a)
                                        <tr>
                                            <td>{{ $a->ps }}</td>
                                            <td>{{ $a->tdk }}</td>
                                            <td>{{ $a->hrg }}</td>
                                    @endforeach
                                    </tr>

                                </tbody>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
