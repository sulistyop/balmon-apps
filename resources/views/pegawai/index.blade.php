@extends('layouts.admin')


@section('content')

<div class="container">
  <div class="mt-2 mb-2">
    <a href="/pegawai/create" class="btn btn-success"> Tambah Data </a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nip</th>
        <th scope="col">Nama</th>
        <th scope="col">Pangkat</th>
        <th scope="col">Golongan</th>
        <th scope="col">Jabatan</th>
        <th scope="col">Foto</th>
        <th scope="col">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($pegawai as $key=> $item)
      <tr>
        <th scope="row">1</th>
        <td>{{ $item->nip }}</td>
        <td>{{ $item->nama }}</td>
        <td>{{ $item->pangkat }}</td>
        <td>{{ $item->golongan }}</td>
        <td>{{ $item->jabatan }}</td>
        <td>{{ $item->foto }}</td>
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