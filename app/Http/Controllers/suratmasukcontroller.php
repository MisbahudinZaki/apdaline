<?php

namespace App\Http\Controllers;

use App\Models\lainnya;
use Illuminate\Http\Request;

class suratmasukcontroller extends Controller
{
    public function index()
    {
        $lains = lainnya::all();
        return view('suratmasuk.index', compact('lains'));
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

        $lastRecord = lainnya::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        lainnya::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('suratmasuk.index');
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

        $beas = lainnya::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('suratmasuk.index');
    }

    public function destroy($id)
    {
        $obat = lainnya::find($id);
        $obat->delete();
        return redirect()->route('suratmasuk.index');
    }
}
