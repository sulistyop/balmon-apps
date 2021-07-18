@extends('layouts.admin')

@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="/balita" style="color: #fd6bc5">Data Pegawai</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Pegawai</li>
    </ol>
</nav>
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <form action="/pegawai" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input autocomplete="off" type="nip" class="form-control @error('nip') is-invalid @enderror" name="nip" id="nip" value="{{ old('nip') }}">
                        @error('nip')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="nama">Nama</label>
                        <input autocomplete="off" type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="pangkat">Pangkat</label>
                        <input autocomplete="off" type="text" class="form-control @error('pangkat') is-invalid @enderror" name="pangkat" id="pangkat" value="{{ old('pangkat') }}">
                        @error('pangkat')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="golongan">Golongan</label>
                        <input autocomplete="off" type="text" class="form-control @error('golongan') is-invalid @enderror" name="golongan" id="golongan" value="{{ old('golongan') }}">
                        @error('golongan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="jabatan">Jabatan</label>
                        <input autocomplete="off" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" id="jabatan" value="{{ old('jabatan') }}"></input>
                        @error('jabatan')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <input type="file" id="foto" name="foto">
                        <input type="submit" value="Upload" </div> </div> <button type="submit" class="btn btn-outline-success">Simpan</button>
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