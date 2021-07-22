<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }
    </style>
    <title>CETAK DATA PEMINJAMAN</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>Laporan Data Peminjaman</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width:  95%;">
            <tr>
                <th>No</th>
                <th>Kode Pinjam</th>
                <th>ID Perangkatt</th>
                <th>Nama Perangkat</th>
                <th>Tgl Pinjam</th>
                <th>Keterangan</th>
                <th>Admin</th>
                <th>Unit</th>
            </tr>
            @foreach ($cetakPeminjaman as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->perangkat->id }}</td>
                <td>{{ $item->perangkat->nama_perangkat }}</td>
                <td>{{ $item->tanggal_keluar }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{$item->pegawai->nama}}</td>
                <td>{{$item->jumlah_barang}}</td>
            </tr>
            @endforeach
        </table>
    </div>
</body>

</html>