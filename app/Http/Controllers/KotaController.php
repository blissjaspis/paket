<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;

class KotaController extends Controller
{
    public function __contruct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('kota.index', ['kotas' => Kota::get()]);
    }

    public function create()
    {
        return view('kota.create');
    }

    public function store(Request $request)
    {
        $kota = new Kota;
        $kota->nama = $request->nama_kota;
        $kota->save();

        return redirect()->route('kota.index');
    }

    public function edit(Kota $kota)
    {
        return view('kota.edit', compact('kota'));
    }

    public function update(Request $request, Kota $kota)
    {
        $kota->nama = $request->nama_kota;
        $kota->save();

        return redirect()->route('kota.index');
    }
}
