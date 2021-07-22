<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Perangkat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::with('perangkat', 'pegawai')->paginate(10);
        return view('Peminjaman.index', compact('peminjaman'));
    }
    public function cetakPeminjaman()
    {
        $cetakPeminjaman = Peminjaman::with('perangkat', 'pegawai')->get();
        return view('Peminjaman.Cetak-peminjaman', compact('cetakPeminjaman'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perangkat = Perangkat::all();
        $pegawai = Pegawai::all();
        return view('peminjaman.create', compact('perangkat', 'pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_perangkat' => 'required',
        ]);

        //Mengambil Stock 
        $perangkat = Perangkat::where(
            [
                ['id', $request->id_perangkat],
            ]
        )->pluck('stok');


        $penguranganStok = $perangkat[0] - $request->jumlah_barang;
        if ($penguranganStok < 0) {
            return redirect('/perangkat')->with('error', 'Stok Barang Kosong , atau Tidak Cukup !');
        } else {
            $peminjaman = Peminjaman::create($request->all());
            Perangkat::where('id', $request->id_perangkat)->update([
                'stok' => $penguranganStok,
            ]);
        }



        return redirect('/perangkat')->with('status', 'Peminjaman Berhasil Dilakukan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.show', compact('peminjaman'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pengembalian(Request $request)
    {
        #method untuk mengambil Nilai Stock
        $stok = $this->getStock($request);

        #method untuk mengecek Status Id
        $cekStatusId = $this->getStatusId($request);

        #Jika Barang Belum Dikembalikan Maka Eksekusi Query DIbawah ini
        if ($cekStatusId == 0) {
            #Mengembalikan Stok yang dipinjam ke Perangkat
            $perangkat = Perangkat::where('id', $request->id_perangkat)->update([
                'stok' => $stok[0] + $request->jumlah_barang,
            ]);
            $peminjaman = Peminjaman::where([
                ['id_perangkat', '=', $request->id_perangkat],
                ['id', '=', $request->id],
            ])->update([
                'tanggal_masuk' => now()->format('d-m-Y'),
            ]);
            $statusId = Peminjaman::where('id_perangkat', $request->id_perangkat)->update(['status_id' => 1]);
        } else {
            return redirect('/peminjaman/' . $request->id)->with('error', 'Barang Sudah Pernah Di Kembalikan !, Tidak Bisa Mengembalikan Lagi !');
        }

        return redirect('/peminjaman/' . $request->id)->with('status', 'Barang Berhasil Dikembalikan !');
    }

    /**
     * Method Dibawah Ini digunakan Untuk Mengechek Status ID dari Tabel Peminjaman
     */
    public function getStatusId($request)
    {
        return Peminjaman::where([
            ['id_perangkat', '=', $request->id_perangkat],
            ['id', '=', $request->id],
        ])->pluck('status_id')[0];
    }

    /**
     * Method dibawah ini digunakan untuk mengambil Stock dari Tabel Perangkat Berdasarkan Id Perangkat
     */
    public function getStock($request)
    {
        #status Id 1 adalah = Sudah Dikembalikan 0 = belom
        return Perangkat::where('id', $request->id_perangkat)->pluck('stok')[0];
    }
}
