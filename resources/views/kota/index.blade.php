@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li class="active">Kota</li>
</ol>
@endsection
@section('content')
<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left">
            Tabel Kota
        </div>
            <div class="pull-right">
                <a href="{{ route('kota.create')}}" class="btn btn-info">Create New</a>
            </div>
        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kota</th>
                    <th>Dibuat</th>
                    <th>Option</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kotas as $key => $kota)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $kota->nama }}</td>
                        <td>{{ $kota->created_at->diffForHumans() }}</td>
                        <td>
                            <a href="#">View </a>
                            <a href="{{ route('kota.edit', $kota) }}"> | Edit |</a>
                            <a href="#">Delete</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada Kota</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
