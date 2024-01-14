<?php

namespace App\Http\Controllers;

use App\Models\rekomendasi;
use Illuminate\Http\Request;

class rekomendasicontroller extends Controller
{
    public function index()
    {
        $reks = rekomendasi::all();
        return view('rekomendasi.index', compact('reks'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
        ]);

        $lastRecord = rekomendasi::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        rekomendasi::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('rekomendasi.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
        ]);

        $beas = rekomendasi::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('rekomendasi.index');
    }

    public function destroy($id)
    {
        $obat = rekomendasi::find($id);
        $obat->delete();
        return redirect()->route('rekomendasi.index');
    }
}
