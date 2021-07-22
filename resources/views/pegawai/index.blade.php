@extends('layouts.admin')


@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
      <li class="breadcrumb-item active" aria-current="page">Data Pegawai</li>
  </ol>
</nav>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="container">
  <div class="mt-2 mb-2">
    <a href="/pegawai/create" class="btn btn-success"> Tambah Data </a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Foto</th>
        <th scope="col">Nip</th>
        <th scope="col">Nama</th>
        <th scope="col">Pangkat</th>
        <th scope="col">Golongan</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pegawai as $key=> $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td><img src="{{ url('/storage/'.$item->foto) }}" class="img-responsive img-rounded"  style="max-height: 50px; max-width: 50px;"></td>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->pangkat }}</td>
        <td>{{ $item->golongan }}</td>
        <td>{{ $item->jabatan }}</td>
        <td>
          <form action="/pegawai/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
          {{-- <a href="/perangkat/{{$item->id}}" class="btn btn-primary" ><i class="fas fa-search"></i></a> --}}
          <a href="/pegawai/{{$item->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$pegawai->links()}}
</div>

@endsection