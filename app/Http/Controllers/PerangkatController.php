<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Perangkat;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{

    //Menampilkan View Index
    public function index()
    {
        $perangkat = Perangkat::orderBy('created_at', 'ASC')->with('pegawai')->paginate(10);
        return view('perangkat.index', compact('perangkat'));
    }


    //Menampilkan View Create
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('perangkat.create', compact('pegawai'));
    }


    //Melakukan Eksekusi Penyimpanan Ke Database
    public function store(Request $request)
    {
        $request->validate([
            'id_perangkat' => 'required',
            'no_seri' => 'required',
            'nama_perangkat' => 'required',
            'stok' => 'required',
            'tahun_pengadaan' => 'required',
            'type_perangkat' => 'required',
            'pegawai_id' => 'required',
        ]);
        Perangkat::create($request->all());
        return redirect('/perangkat')->with('status', 'Data Balita berhasil ditambahkan!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $perangkat = Perangkat::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('perangkat.edit', compact('pegawai', 'perangkat'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'id_perangkat' => 'required',
            'no_seri' => 'required',
            'nama_perangkat' => 'required',
            'stok' => 'required',
            'tahun_pengadaan' => 'required',
            'type_perangkat' => 'required',
            'pegawai_id' => 'required',
        ]);
        Perangkat::where('id', $id)
            ->update([
                'id_perangkat' => $request->id_perangkat,
                'no_seri' => $request->no_seri,
                'nama_perangkat' => $request->nama_perangkat,
                'stok' => $request->stok,
                'tahun_pengadaan' => $request->tahun_pengadaan,
                'type_perangkat' => $request->type_perangkat,
                'pegawai_id' => $request->pegawai_id,
            ]);
        return redirect('/perangkat')->with('status', 'Data Balita berhasil diupdate!');
    }


    public function destroy($id)
    {
        Perangkat::destroy($id);
        return redirect('/perangkat')->with('status', 'Data Balita berhasil dihapus!');
    }
}
