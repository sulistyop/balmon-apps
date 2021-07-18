@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="mt-2 mb-2">
        <a href="/perangkat/create" class="btn btn-success"> Tambah Data </a>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Id Perangkat</th>
                <th scope="col">No Seri</th>
                <th scope="col">Nama Perangkat</th>
                <th scope="col">Stok</th>
                <th scope="col">Tahun Pengadaan</th>
                <th scope="col">Tipe Perangkat</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($perangkat as $key=> $item)
            <tr>
                <th scope="row">1</th>
                <td>{{ $item->id_perangkat }}</td>
                <td>{{ $item->no_seri}}</td>
                <td>{{ $item->nama_perangkat }}</td>
                <td>{{ $item->stok }}</td>
                <td>{{date('d F Y',strtotime($item->tahun_pengadaan))}}</td>
                <td>{{ $item->type_perangkat }}</td>
                <td>{{$item->pegawai->nama}}</td>
                <td>
                    <form action="/perangkat/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                    </form>
                    {{-- <a href="/perangkat/{{$item->id}}" class="btn btn-primary" ><i class="fas fa-search"></i></a> --}}
                    <a href="/perangkat/{{$item->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$perangkat->links()}}
</div>

@endsection