<?php

namespace App\Http\Controllers;

use App\Models\berobat;
use App\Models\ekspedisi;
use App\Models\imtaq;
use App\Models\lainnya;
use App\Models\peduli;
use App\Models\psmcerdas;
use App\Models\rekomendasi;
use App\Models\sejahtera;
use App\Models\sptsppd;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function cari(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = berobat::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.index', compact('results'));
    }

    public function caribeasiswa(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = psmcerdas::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.beasiswa', compact('results'));
    }

    public function modalusaha(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = sejahtera::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.modus', compact('results'));
    }

    public function peduli(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = peduli::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.peduli', compact('results'));
    }

    public function imtaq(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = imtaq::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.imtaq', compact('results'));
    }

    public function surat(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = lainnya::where('jenis', 'like', "%$keyword%")->get();

        return view('search.suratmasuk', compact('results'));
    }

    public function ekspedisi(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = ekspedisi::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.ekspedisi', compact('results'));
    }

    public function sptsppd(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = sptsppd::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.ekspedisi', compact('results'));
    }
    public function rekomendasi(Request $request)
    {
        $keyword = $request->input('keyword');

        $results = rekomendasi::where('pengirim', 'like', "%$keyword%")->get();

        return view('search.rekomendasi', compact('results'));
    }

}
