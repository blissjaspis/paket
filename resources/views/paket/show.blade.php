@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('paket.index') }}">Paket</a></li>
    <li class="active">Show</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                Show Paket
            </div>
            <div class="pull-right">
                <a href="{{ route('laporan.paket', $paket) }}" class="btn btn-info">Create Laporan</a>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <div class="col-sm-12">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                        </tr>
                    </thead>
                    <tbody id="wrapper">
                        @forelse ($paket->bukus()->get() as $value)
                            <tr>
                                <td>
                                    {{ $value->kode }}
                                </td>
                                <td>
                                    {{ $value->nama }}
                                </td>
                                <td>
                                    {{ $value->jumlah }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    Tidak ada Buku
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <form class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Kota:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $paket->kota->nama }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Dibuat:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $paket->user->name }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Tanggal Dikirim:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $paket->tanggal_kirim->formatLocalized('%d %B %Y') }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Status :</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $paket->status ? 'Terkirim' : 'Belum Diterima' }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Foto Resi:</label>
                    <div class="col-sm-9">
                        <a href="#" class="thumbnail">
                            <img src="{{ url('/images/resi/'.$paket->foto_resi)}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Foto Barang:</label>
                    <div class="col-sm-9">
                        <a href="#" class="thumbnail">
                            <img src="{{ url('/images/barang/'.$paket->foto_barang)}}" alt="">
                        </a>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
