@extends('layouts.admin')


@section('content')
<div class="container">
    <div class="mt-2 mb-2">
        <a href="/peminjaman/create" class="btn btn-success"> Tambah Data </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id Perangkat</th>
                <th scope="col">No Seri</th>
                <th scope="col">Nama Perangkat</th>
                <th scope="col">Tanggal Peminjaman</th>
                <th scope="col">Tanggal Pengembalian</th>
                <th scope="col">Keperluan</th>
                <th scope="col">Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peminjaman as $key=> $item)
            <tr>
                <th scope="row">1</th>
                <td>{{ $item->id_perangkat }}</td>
                <td>{{ $item->no_seri}}</td>
                <td>{{ $item->nama_perangkat }}</td>
                <td>{{ $item->tanggal_peminjaman }}</td>
                <td>{{ $item->tanggal_pengembalian }}</td>
                <td>{{ $item->keperluan }}</td>
                <td>{{$item->user->nama}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$peminjaman->links()}}
</div>

@endsection