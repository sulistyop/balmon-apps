<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::paginate(10);
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('pegawai.create', compact('pegawai'));
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
            'nama' => 'required|string',
            // 'foto' => 'required',
            'nip' => 'required',
            'nama' => 'required',
            'pangkat' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
        ]);


        $image = $request->foto;

        $imageExtension = $request->foto->getClientOriginalExtension();
        $imageName = 'img_' . time() . '.' . $imageExtension;
        $path = $request->foto->storeAs('images', $imageName, 'public');

        $data = new Pegawai();
        $data->nama = $request->nama;
        $data->foto = $path;
        $data->nip = $request->nip;
        $data->pangkat = $request->pangkat;
        $data->golongan = $request->golongan;
        $data->jabatan = $request->jabatan;
        $data->save();


        return redirect('/pegawai')->with('toast_success', 'Data Berhasil Tersimpan!');
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
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('pegawai'));
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
        $pegawai = Pegawai::findOrFail($id);
        $pegawai->update($request->all());
        return redirect('/pegawai')->with('toast_success', 'Data Berhasil Terupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pegawai::destroy($id);
        return redirect('/pegawai')->with('status', 'Data Orang Tua berhasil dihapus!');
    }
}
