<?php

namespace App\Http\Controllers;

use App\Models\sptsppd;
use Illuminate\Http\Request;

class sptsppdcontroller extends Controller
{
   public function index()
   {
    $spts = sptsppd::all();
    return view('sptsppd.index', compact('spts'));
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

        $lastRecord = sptsppd::orderBy('no_urut', 'desc')->first();

        $nomorUrut = $lastRecord ? $lastRecord->no_urut + 1 : 1;

        sptsppd::create([
            'no_urut'=>$nomorUrut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('sptsppd.index');
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

        $beas = sptsppd::find($id);
        $beas->update([
            'no_urut'=>$request->no_urut,
            'pengirim'=>$request->pengirim,
            'jenis'=>$request->jenis,
            'alamat_pengirim'=>$request->alamat_pengirim,
            'tanggal_masuk'=>$request->tanggal_masuk
        ]);

        return redirect()->route('sptsppd.index');
    }

    public function destroy($id)
    {
        $obat = sptsppd::find($id);
        $obat->delete();
        return redirect()->route('sptsppd.index');
    }
}
