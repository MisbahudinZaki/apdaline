<?php

namespace App\Http\Controllers;

use App\Models\psmcerdas;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    public function index()
    {
        $beasiswas = psmcerdas::all();
        return view('pasaman_cerdas.index', compact('beasiswas'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable'
        ]);

        $lastRecord = psmcerdas::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        psmcerdas::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('beasiswa.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable'
        ]);

        $beas = psmcerdas::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('beasiswa.index');
    }


    public function destroy($id)
    {
        $obat = psmcerdas::find($id);
        $obat->delete();
        return redirect()->route('beasiswa.index');
    }
}
