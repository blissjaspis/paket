@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('laporan.index') }}">Laporan</a></li>
    <li class="active">Create</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Laporan Paket
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('laporan.store') }}" method="post" enctype="multipart/form-data">

                {{ csrf_field() }}
                <input type="hidden" name="paket_id" value="{{ $paket->id }}">
                <div class="col-sm-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama Buku</th>
                                <th>Jumlah Buku</th>
                                <th>Diterima</th>
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
                                    <td>
                                        <input type="hidden" name="buku_id[]" value="{{ $value->id }}">
                                        <input type="text" class="form-control" name="buku[]" autofocus>
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

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="tanggal_diterima">Tanggal Diterima:</label>
                    <div class="col-sm-10">
                        <input type="date" id="tanggal_diterima" class="form-control" name="tanggal_diterima">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="foto_barang">Foto Barang Diterima:</label>
                    <div class="col-sm-10">
                        <input type="file" id="foto_barang" class="form-control" name="foto_barang">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="status">Status:</label>
                    <div class="col-sm-10">
                        <select id="status" class="form-control" name="status">
                            <option value="1">Diterima Lengkap</option>
                            <option value="2">Diterima Tidak Lengkap</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="keterangan">Keterangan:</label>
                    <div class="col-sm-10">
                        <textarea id="keterangan" name="keterangan"class="form-control" rows="4" cols="40"></textarea>
                    </div>
                </div>

                <hr>

                <button type="submit" class="pull-right btn btn-success">Create</button>

            </form>
        </div>
    </div>
@endsection
