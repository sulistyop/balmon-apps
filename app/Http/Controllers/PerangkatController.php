<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\Perangkat;
use Illuminate\Http\Request;

class PerangkatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perangkat = Perangkat::orderBy('created_at', 'ASC')->with('pegawai')->paginate(10);
        return view('perangkat.index', compact('perangkat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('perangkat.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
        $request->validate([
            'id_perangkat' => 'required',
            'no_seri' => 'required',
            'nama_perangkat' => 'required',
            'pegawai_id' => 'required',
            'stok' => 'required',
            'tahun_pengadaan' => 'required',
            'type_perangkat' => 'required',
        ]);
        $data = new Perangkat();
        $data->id_perangkat = $request->id_perangkat;
        $data->nama_perangkat = $request->nama_perangkat;
        $data->no_seri = $request->no_seri;
        $data->pegawai_id = $request->pegawai_id;
        $data->stok = $request->stok;
        $data->tahun_pengadaan = $request->tahun_pengadaan;
        $data->type_perangkat = $request->type_perangkat;
        $data->save();
        return redirect()->route('perangkat.index');
        }
        catch{
            
        }
        
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
        $perangkat = Perangkat::findOrFail($id);
        $pegawai = Pegawai::all();
        return view('perangkat.edit', compact('pegawai', 'perangkat'));
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
        $perangkat = Perangkat::findOrFail($id);
        $perangkat->update($request->all());
        return redirect('perangkat')->with('toast_success', 'Data Berhasil Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Perangkat::destroy($id);
        return redirect('perangkat.index')->with('status', 'Data Perangkat berhasil dihapus!');
    }
}
