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
            Show Laporan
        </div>

        <div class="panel-body">
            <div class="col-sm-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Nama Buku</th>
                            <th>Jumlah Buku</th>
                            <th>Jumlah Diterima</th>
                        </tr>
                    </thead>
                    <tbody id="wrapper">
                        @forelse ($laporan->paket()->first()->bukus()->get() as $value)
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
                                <td>
                                    {{ $value->jumlah_diterima }}
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
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
                        <p class="text-block">{{ $laporan->paket->kota }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Dibuat:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $laporan->user->name }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Tanggal Diterima:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $laporan->tanggal_diterima->formatLocalized('%d %B %Y') }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Status :</label>
                    <div class="col-sm-9">
                        @if ($laporan->paket->status == 2)
                            <p class="text-block">Diterima Tidak Lengkap</p>
                        @elseif ($laporan->paket->status == 1)
                            <p class="text-block">Diterima Lengkap</p>
                        @else
                            <p class="text-block">Belum Diterima</p>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Foto Barang:</label>
                    <div class="col-sm-9">
                        <a href="#" class="thumbnail">
                            <img src="{{ url('/images/barang/'.$laporan->foto_barang)}}" alt="">
                        </a>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="kota">Keterangan:</label>
                    <div class="col-sm-9">
                        <p class="text-block">{{ $laporan->keterangan }}</p>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
