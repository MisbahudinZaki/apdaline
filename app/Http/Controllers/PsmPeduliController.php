<?php

namespace App\Http\Controllers;

use App\Models\peduli;
use Illuminate\Http\Request;

class PsmPeduliController extends Controller
{
    public function index()
    {
        $pedulis = peduli::all();
        return view('pasaman_peduli.index', compact('pedulis'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable',

        ]);

        $lastRecord = peduli::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        peduli::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('peduli.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'nullable',
        ]);

        $beas = peduli::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('peduli.index');
    }

    public function destroy($id)
    {
        $obat = peduli::find($id);
        $obat->delete();
        return redirect()->route('peduli.index');
    }
}
