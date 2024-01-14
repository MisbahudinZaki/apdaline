<?php

namespace App\Http\Controllers;

use App\Models\berobat;
use Illuminate\Http\Request;

class berobatcontroller extends Controller
{
    public function index(){
        $obats = berobat::latest()->paginate(10);
        return view('pasaman_sehat.index', compact('obats'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable',

        ]);

        $lastRecord = berobat::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;


        berobat::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('berobat.index');
    }

    public function destroy($id)
    {
        $obat = berobat::find($id);
        $obat->delete();
        return redirect()->route('berobat.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_urut'=>'required',
            'pengirim'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable',
        ]);

        $obat = berobat::find($id);
        $obat->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('berobat.index');
    }
}
