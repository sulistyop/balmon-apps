@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="mt-2 mb-2">
        <a href="/peminjaman/create" class="btn btn-success"> Tambah Data </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID Perangkatt</th>
                <th scope="col">No Seri</th>
                <th scope="col">Nama Perangkat</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Penanggungjawab</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $key=> $item)
            <tr>
                <th scope="row">1</th>
                <td>{{ $item->perangkat->id_perangkatt }}</td>
                <td>{{ $item->perangkat->no_seri}}</td>
                <td>{{ $item->perangkat->nama_perangkat }}</td>
                <td>{{ $item->tanggal_masuk }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{$item->pegawai->nama}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$peminjaman->links()}}
</div>

@endsection