@extends('layouts.admin')


@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<div class="container">
  <div class="mt-2 mb-2">
    <a href="/kategori/create" class="btn btn-success"> Tambah Data </a>
  </div>
  <table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">ID Kategori</th>
        <th scope="col">Nama</th>
        <th scope="col">Aksi</th>
        
      </tr>
    </thead>
    <tbody>
      @foreach ($kategori as $key=> $item)
      <tr>
        <td>{{ $item->id }}</td>
        <td>{{ $item->nama_kategori }}</td>
    
        <td>
          <form action="/kategori/{{$item->id}}" method="post" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
          </form>
          <a href="/kategori/{{$item->id}}/edit" class="btn btn-primary"><i class="fas fa-edit"></i></a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  {{$kategori->links()}}
</div>

@endsection