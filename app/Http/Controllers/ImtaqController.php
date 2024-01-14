<?php

namespace App\Http\Controllers;

use App\Models\imtaq;
use Illuminate\Http\Request;

class ImtaqController extends Controller
{
    public function index()
    {
        $imtaqs = imtaq::all();
        return view('pasaman_imtaq.index', compact('imtaqs'));
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

        $lastRecord = imtaq::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        imtaq::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('imtaq.index');
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'no_urut'=>'nullable',
            'pengirim'=>'required',
            'jenis'=>'required',
            'alamat_pengirim'=>'required',
            'tanggal_masuk'=>'required',
            'tanggal_keluar'=>'required',
        ]);

        $beas = imtaq::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk,
            'tanggal_keluar'=>$request->tanggal_keluar
        ]);

        return redirect()->route('imtaq.index');
    }

    public function destroy($id)
    {
        $obat = imtaq::find($id);
        $obat->delete();
        return redirect()->route('imtaq.index');
    }
}
