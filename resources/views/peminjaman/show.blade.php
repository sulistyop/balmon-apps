@extends('layouts.admin')


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/peminjaman" style="color: #fd6bc5">Data Pinjaman</a></li>
        <li class="breadcrumb-item active" aria-current="page">Detail Peminjaman</li>
    </ol>
</nav>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container">
    <table class="table table-striped">
        <tr>
            <td> Nama Pegawai (Peminjam) </td>
            <td>:</td>
            <td>  {{$peminjaman->pegawai->nama}}</td>
        </tr>
        <tr>
            <td> Kode Peminjaman </td>
            <td>:</td>
            <td>  {{$peminjaman->id}}</td>
        </tr>
        <tr>
            <td> ID Perangkat </td>
            <td>:</td>
            <td> {{$peminjaman->id_perangkat}}</td>
        </tr>
        <tr>
            <td> Nama Barang Yang Dipinjam </td>
            <td>:</td>
            <td> {{$peminjaman->perangkat->nama_perangkat}}</td>
        </tr>
        <tr>
            <td> Total Barang Yang Dipinjam </td>
            <td>:</td>
            <td> {{$peminjaman->jumlah_barang}} Unit</td>
        </tr>
        <tr>
            <td>Keterangan  </td>
            <td>:</td>
            <td> {{$peminjaman->keterangan}}</td>
        </tr>
        <tr>
            <td> Status Barang </td>
            <td>:</td>
            <td>
                @php
                    if($peminjaman->status_id !== 0){
                        echo $status = '<span style="background:#66ff00;color:grey;padding:5px;"> Barang Sudah Dikembalikan</span>';
                    }else{
                        echo $status = '<span style="background:red;color:white;padding:5px;"> Barang Belum Dikembalikan</span>';
                    }
                @endphp
            </td>
        </tr>
        <tr>
            <td> Tanggal Pengembalian </td>
            <td>:</td>
            <td>  {{$peminjaman->tanggal_masuk}}</td>
        </tr>
        <tr>
            <td>Admin Yang Menangani</td>
            <td>:</td>
            <td> {{Auth::user()->name}}</td>
        </tr>
        
        
    </table>

    <form action="/pengembalian" method="post" enctype="multipart/form-data" onsubmit="return confirm('Yakin ingin Mengembalikan Barang ini?')">
        @csrf
        @method('post')
        <div class="row">
            <div class="col-4">
                <div class="form-group mt-2">
                    <input autocomplete="off"class="form-control @error('id_perangkat') is-invalid @enderror" name="id_perangkat" id="id_perangkat" value="{{$peminjaman->id_perangkat}}" hidden>
                    <input autocomplete="off"class="form-control @error('id') is-invalid @enderror" name="id" id="id" value="{{$peminjaman->id}}" hidden>
                    <input autocomplete="off"class="form-control @error('status_id') is-invalid @enderror" name="status_id" id="status_id" value="1" hidden>
                    <input autocomplete="off" type="number" class="form-control @error('jumlah_barang') is-invalid @enderror" name="jumlah_barang" id="jumlah_barang" value="{{ $peminjaman->jumlah_barang }}" hidden>
                    @error('jumlah_barang')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-2 mb-2">
            <button type="submit" class="btn btn-outline-success" >Kembalikan Barang</button>
        </div>
    </form>
  
</div>

@endsection