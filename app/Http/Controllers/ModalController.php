<?php

namespace App\Http\Controllers;

use App\Models\sejahtera;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    public function index()
    {
        $modals = sejahtera::all();
        return view('pasaman_sejahtera.index', compact('modals'));
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

        $lastRecord = sejahtera::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;


        sejahtera::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('modalusaha.index');
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

        $obat = sejahtera::find($id);
        $obat->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('modalusaha.index');
    }
    public function destroy($id)
    {
        $obat = sejahtera::find($id);
        $obat->delete();
        return redirect()->route('modalusaha.index');
    }
}
