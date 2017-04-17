@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li class="active">Laporan</li>
</ol>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        Tabel Laporan
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Paket ID</th>
                    <th>Diterima</th>
                    <th>Oleh</th>
                    <th>Status</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($laporan as $key => $lp)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $lp->paket_id }}</td>
                        <td>{{ $lp->tanggal_diterima->formatLocalized('%d %B %Y') }}</td>
                        <td>{{ $lp->user->name }}</td>
                        @if ($lp->paket->status == 2)
                            <td>Diterima Tidak Lengkap</td>
                        @elseif ($lp->paket->status == 1)
                            <td>Diterima Lengkap</td>
                        @else
                            <td>Belum Diterima</td>
                        @endif
                        <td>
                            <a href="{{ route('laporan.show', $lp) }}">View </a>
                            @role('administrator')
                            <a href="{{ route('laporan.edit', $lp) }}"> | Edit |</a>
                            <a href="#">Delete</a>
                            @endrole
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada Laporan</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
