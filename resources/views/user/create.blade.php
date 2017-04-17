@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('user.index') }}">User</a></li>
    <li class="active">Create</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Create User
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('user.store') }}" method="post" enctype="multipart/form-data" role="form">

                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" class="form-control" name="name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" class="form-control" name="email">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="role">Role:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="role">Kota:</label>
                    <div class="col-sm-10">
                        <select id="kota" class="form-control" name="kota">
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control" value="">
                    </div>
                </div>

                <hr>

                <button type="submit" class="pull-right btn btn-success">Simpan</button>

            </form>
        </div>
    </div>
@endsection
