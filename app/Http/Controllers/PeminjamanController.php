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

        //
        // $request->validate([
        //     'id_perangkat' => 'required',
        //     'no_seri' => 'required',
        //     'nama_perangkat' => 'required',
        //     'stok' => 'required',
        //     'tahun_pengadaan' => 'required',
        //     'type_perangkat' => 'required',
        //     'pegawai_id' => 'required',
        // ]);


        $x = Peminjaman::create($request->all());


        $perangkat = Perangkat::where(
            [
                ['id', $request->perangkat_id],
                ['id', $request->perangkat_id],
            ]
        )->pluck('stok');


        $penguranganStok = $perangkat[0] - 1;
        Perangkat::where('id', $request->perangkat_id)->update([
            'stok' => $penguranganStok,
        ]);


        return redirect('/perangkat')->with('status', 'Data Balita berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
