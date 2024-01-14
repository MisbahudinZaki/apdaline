<?php

namespace App\Http\Controllers;

use App\Models\ekspedisi;
use Illuminate\Http\Request;

class ekspedisicontroller extends Controller
{
    public function index(){
        $ekps = ekspedisi::all();
        return view('ekspedisi.index', compact('ekps'));
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

        $lastRecord = ekspedisi::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        ekspedisi::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('ekspedisi.index');
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

        $beas = ekspedisi::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('ekspedisi.index');
    }

    public function destroy($id)
    {
        $obat = ekspedisi::find($id);
        $obat->delete();
        return redirect()->route('ekspedisi.index');
    }
}
