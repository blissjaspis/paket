@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li class="active">Paket</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                Table Paket
            </div>
                <div class="pull-right">
                    <a href="{{ route('paket.create')}}" class="btn btn-info">Create New</a>
                </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>kota</th>
                        <th>Dikirim</th>
                        <th>Oleh</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pakets as $key => $paket)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $paket->kota->nama }}</td>
                            <td>{{ $paket->tanggal_kirim->formatLocalized('%d %B %Y') }}</td>
                            <td>{{ $paket->user->name }}</td>
                            <td>{{ $paket->status ? 'Terkirim' : 'Belum Diterima' }}</td>
                            <td>
                                <a href="{{ route('paket.show', $paket) }}">View </a>
                                @role('administrator')
                                <a href="{{ route('paket.edit', $paket) }}"> | Edit |</a>
                                <a href="#">Delete</a>
                                @endrole
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada Paket!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
