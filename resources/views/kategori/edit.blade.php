@extends('layouts.admin')

@section('content')


<div class="row justify-content-center">
    <div class="container">
        <div class="col">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <form action="/kategori/{{$kategori->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group mt-2">
                        <label for="nama">Nama</label>
                        <input autocomplete="on" type="text" class="form-control @error('nama_kategori') is-invalid @enderror" name="nama_kategori" id="nama" value="{{ $kategori->nama_kategori }}">
                        @error('nama_kategori')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection