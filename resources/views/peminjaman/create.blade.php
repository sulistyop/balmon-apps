@extends('layouts.admin')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/perangkat" style="color: #fd6bc5">Data Peminjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Peminjaman</li>
    </ol>
</nav>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <form action="/peminjaman" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="inlineFormCustomSelect">ID Perangkat</label>
                        <select name="id_perangkat" class="custom-select mr-sm-2 @error('id_perangkat') is-invalid @enderror" id="inlineFormCustomSelect">
                            @foreach ($perangkat as $option)
                            <option value="{{$option->id ?? null}}">{{$option->id." - ".$option->kategori->nama_kategori." - ".$option->no_seri." - ".$option->nama_perangkat ?? null}}</option>
                            @endforeach
                        </select>
                        @error('tanggal_keluar')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="tanggal_keluar">Tanggal Peminjaman</label>
                                        <input autocomplete="off" type="text" class="date form-control @error('tanggal_keluar') is-invalid @enderror" name="tanggal_keluar" id="tanggal_keluar" value="{{ old('tanggal_keluar') }}">
                                        @error('tanggal_keluar')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-group">
                                        <label for="tanggal_masuk">Tanggal Pengembalian</label>
                                        <input autocomplete="off" type="text" class="date form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" id="tanggal_masuk" value="{{ old('tanggal_masuk') }}">
                                        @error('tanggal_masuk')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                        @enderror
                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input autocomplete="off" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" value="{{ old('keterangan') }}">
                                @error('keterangan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="jumlah_barang">Jumlah Barang Dipinjam</label>
                                <input autocomplete="off" type="text" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" id="jumlah_barang" value="{{ old('jumlah_barang') }}">
                                @error('jumlah_barang')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inlineFormCustomSelect">Penanggungjawab</label>
                                <select name="pegawai_id" class="custom-select mr-sm-2 @error('pegawai_id') is-invalid @enderror" id="inlineFormCustomSelect">
                                    @foreach ($pegawai as $option)
                                    <option value="{{$option->id ?? null}}">{{$option->nama ?? null}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-outline-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>

@endsection