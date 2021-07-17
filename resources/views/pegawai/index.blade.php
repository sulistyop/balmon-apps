@extends('layouts.admin')


@section('content')

<div class="container">
    <div class="mt-2 mb-2">
        <a href="/pegawai/create" class="btn btn-success"> Tambah Data </a>
    </div>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($pegawai as $key=> $item)
                <tr>
                    <th scope="row">1</th>
                    <td>{{$item->nip}}</td>
                    <td>{{$item->nama}}</td>
                    <td>{{$item->pangkat}}</td>
                </tr>
            @endforeach
        </tbody>
      </table>
      {{$pegawai->links()}}
</div>

@endsection