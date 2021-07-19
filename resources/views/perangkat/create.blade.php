@extends('layouts.admin')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/perangkat" style="color: #fd6bc5">Data Perangkat</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Perangkat</li>
    </ol>
</nav>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <form action="/perangkat" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="id_perangkat">ID Perangkat</label>
                        <input autocomplete="off" type="text" class="form-control @error('id_perangkat') is-invalid @enderror" name="id_perangkat" id="id_perangkat" value="{{ old('id_perangkat') }}">
                        @error('id_perangkat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_seri">No Seri</label>
                        <input autocomplete="off" type="text" class="form-control @error('no_seri') is-invalid @enderror" name="no_seri" id="no_seri" value="{{ old('no_seri') }}">
                        @error('no_seri')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_perangkat">Nama Perangkat</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama_perangkat') is-invalid @enderror" name="nama_perangkat" id="nama_perangkat" value="{{ old('nama_perangkat') }}">
                        @error('nama_perangkat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input autocomplete="off" type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" value="{{ old('stok') }}">
                        @error('stok')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label for="tahun_pengadaan">Tanggal Pengadaan</label>
                                <input autocomplete="off" type="text" class="date form-control @error('tahun_pengadaan') is-invalid @enderror" name="tahun_pengadaan" id="tahun_pengadaan" value="{{ old('tahun_pengadaan') }}">
                                @error('tahun_pengadaan')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="type_perangkat">Tipe Perangkat</label>
                        <input autocomplete="off" type="text" class="form-control @error('type_perangkat') is-invalid @enderror" name="type_perangkat" id="type_perangkat" value="{{ old('type_perangkat') }}">
                        @error('type_perangkat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inlineFormCustomSelect">Penanggungjawab</label>
                        <select name="pegawai_id" class="custom-select mr-sm-2 @error('pegawai_id') is-invalid @enderror" id="inlineFormCustomSelect">
                            @foreach ($pegawai as $option)
                            <option value="{{$option->id ?? null}}">{{$option->nama ?? null}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('.date').datepicker({
        format: 'dd-mm-yyyy'
    });
</script>

@endsection