<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paket;
use App\Models\Buku;
use App\Models\Kota;
use Carbon\Carbon;
use Image;

class PaketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (request()->user()->hasRole('administrator')) {
            $pakets = Paket::get();
            return view('paket.index', compact('pakets'));
        } else {
            $pakets = Paket::userPaket();
            return view('paket._i_user', compact('pakets'));
        }
    }

    public function create()
    {
        return view('paket.create', ['kotas' => Kota::get()]);
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

            if ($request->hasFile('foto_resi')) {
                $destination = public_path('images/resi/');

                $resi = str_random(40).'.jpg';
                $move = $destination.$resi;

                ($request->file('foto_resi')->getSize() / 1024 > 200) ? Image::make($request->file('foto_resi')->getRealPath())->resize(640, 360)->save($move)
                : Image::make($request->file('foto_resi')->getRealPath())->save($move);
            }

            $paket = Paket::create([
                'user_id' => \Auth::user()->id,
                'kota_id' => $request->kota,
                'tanggal_kirim' => Carbon::parse($request->tanggal_dikirim),
                'foto_resi' => $resi,
                'foto_barang' => $barang
            ]);

            foreach ($request->kode as $key => $value) {
                $paket->bukus()->create([
                    'kode' => $request->kode[$key],
                    'nama' => $request->nama_buku[$key],
                    'jumlah' => $request->jumlah_buku[$key]
                ]);
            }
            return redirect()->route('paket.index');
        } catch (Exception $e) {
            return back();
        }
    }

    public function show(Paket $paket)
    {
        return view('paket.show', compact('paket'));
    }
}
