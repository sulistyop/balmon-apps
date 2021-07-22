@extends('layouts.admin')

@section('content')
<style>
    .border-left-primary {
        border-left: 0.25rem solid #fd6bc5
            /* #4e73df*/
             !important;
    }

    .border-left-secondary {
        border-left: 0.25rem solid #858796 !important;
    }

    .border-left-success {
        border-left: 0.25rem solid #1cc88a !important;
    }

    .border-left-info {
        border-left: 0.25rem solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: 0.25rem solid #f6c23e !important;
    }

    .border-left-danger {
        border-left: 0.25rem solid #e74a3b !important;
    }

    .border-left-light {
        border-left: 0.25rem solid #f8f9fc !important;
    }

    .border-left-dark {
        border-left: 0.25rem solid #5a5c69 !important;
    }
</style>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dashboard" style="color: #fd6bc5">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Perangkat</li>
    </ol>
</nav>
<div class="">
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="container">
        <div class="mt-2 mb-2">
          <a href="/perangkat/create" class="btn btn-success"> Tambah Data </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped"  width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Kategori</th>
                        <th scope="col">No Seri</th>
                        <th scope="col">Nama Perangkat</th>
                        <th scope="col">Stok </th>
                        <th scope="col">Tanggal Pengadaan</th>
                        <th scope="col">Tipe Perangkat</th>
                        <th scope="col">Penanggungjawab</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach($perangkat as $key => $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->kategori->nama_kategori}}</td>
                        <td>{{$item->no_seri}}</td>
                        <td>{{$item->nama_perangkat}}</td>
                        <td>{{$item->stok}}</td>
                        <td>{{date('d F Y',strtotime($item->tanggal_pengadaan))}}</td>
                        <td>{{$item->type_perangkat}}</td>
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

    </div>
    @endsection