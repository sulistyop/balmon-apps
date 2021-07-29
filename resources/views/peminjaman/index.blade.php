@extends('layouts.admin')


@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Peminjaman</li>
    </ol>
</nav>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="container">
    <div class="mt-2 mb-2">
        <a href="/peminjaman/create" class="btn btn-success"> Tambah Data <i class="fas fa-plus-square"></i></a>
    <form action="{{url('/cetak')}}" method="get">
        <button class="btn btn-primary" type="submit"> Cetak Peminjaman <i class="fas fa-print"></i></button>
    </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Kode Pinjam</th>
                <th scope="col">ID Perangkatt</th>
                <th scope="col">Nama Perangkat</th>
                <th scope="col">Tgl Pinjam</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Admin</th>
                <th scope="col">Unit</th>
                <th scope="col">Status</th>
                <th scope="col">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $key=> $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->perangkat->id }}</td>
                <td>{{ $item->perangkat->nama_perangkat }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{$item->pegawai->nama}}</td>
                <td>{{$item->jumlah_barang}}</td>
                <td>
                    @php
                    if($item->status_id !== 0){
                    echo $status = '<span style="background:#66ff00;color:grey;padding:1px;">Done</span>';
                    }else{
                    echo $status = '<span style="background:red;color:white;padding:1px;">Use</span>';
                    }
                    @endphp
                </td>
                <td>
                    <a class="btn btn-primary" href="/peminjaman/{{$item->id}}"><i class="fas fa-search"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$peminjaman->links()}}
</div>

@endsection