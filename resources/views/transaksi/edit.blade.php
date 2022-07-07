@extends('layouts.master')
@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                      
                    <form action="{{ route('transaksi.update',$data->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">NAMA</label>
                                <select class="form-control" name="ps">
                                    <option>Select Item</option>
                                    @foreach ($data2 as $key => $value)
                                        <option value="{{ $value }}" {{ $value == $value ? 'selected' : '' }}>
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
                                        <option value="{{ $value }}" {{ $value == $value ? 'selected' : '' }}>
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
                                        <option value="{{ $value }}" {{ $value == $value ? 'selected' : '' }}>
                                            {{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">Tanggal </label>
                                <input type="date" class="form-control @error('wk') is-invalid @enderror" name="wk"
                                    value="{{ old('wk',$data->wk) }}" placeholder="Masukkan Tanggal">

                                <!-- error message untuk title -->
                                @error('wk')
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