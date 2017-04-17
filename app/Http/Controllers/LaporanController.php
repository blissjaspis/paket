<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Paket;
use App\Models\Buku;
use Carbon\Carbon;
use Image;

class LaporanController extends Controller
{
    public function __constuct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('laporan.index', ['laporan' => Laporan::get()]);
    }

    public function paket(Paket $paket)
    {
        return view('laporan.paket', compact('paket'));
    }

    public function store(Request $request)
    {
        try {
            if ($request->hasFile('foto_barang')) {
                $destination = public_path('images/barang/');

                $barang = str_random(40).'.jpg';
                $move = $destination.$barang;

                ($request->file('foto_barang')->getSize() / 1024 > 200) ? Image::make($request->file('foto_barang')->getRealPath())->resize(640, 360)->save($move)
                : Image::make($request->file('foto_barang')->getRealPath())->save($move);
            }

            $paket = Paket::findOrFail($request->paket_id);
            $paket->laporans()->create([
                'user_id' => \Auth::user()->id,
                'tanggal_diterima' => Carbon::parse($request->tanggal_diterima),
                'foto_barang' => $barang,
                'mobile' => $request->mobile,
                'keterangan' => $request->keterangan
            ]);
            $paket->status = $request->status;
            $paket->save();

            foreach ($request->buku_id as $key => $buku) {
                $setBuku = Buku::findOrFail($buku);
                $setBuku->jumlah_diterima = $request->buku[$key];
                $setBuku->save();
            }

            return redirect()->route('laporan.index');
        } catch (Exception $e) {
            return back();
        }
    }

    public function show(Laporan $laporan)
    {
        return view('laporan.show', compact('laporan'));
    }
}
