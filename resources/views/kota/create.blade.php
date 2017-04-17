@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('kota.index') }}">Kota</a></li>
    <li class="active">Create</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create Kota
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('kota.store') }}" method="post" role="form">

                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-4 control-label" for="nama_kota">Nama Kota:</label>
                    <div class="col-sm-6">
                        <input type="text" id="nama_kota" class="form-control" name="nama_kota">
                    </div>
                </div>

                <hr>

                <button type="submit" class="pull-right btn btn-success">Simpan</button>

            </form>
        </div>
    </div>
@endsection
