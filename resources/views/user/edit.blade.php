@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{{ url('/home')}}">Home</a></li>
    <li><a href="{{ route('user.index') }}">User</a></li>
    <li class="active">Edit</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            Edit User
        </div>

        <div class="panel-body">
            <form class="form-horizontal" action="{{ route('user.update', $user) }}" method="post" enctype="multipart/form-data" role="form">

                {{ method_field('PUT') }}
                {{ csrf_field() }}

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="name">Nama:</label>
                    <div class="col-sm-10">
                        <input type="text" id="name" class="form-control" name="name" value="{{ $user->name }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="email">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" id="email" class="form-control" name="email" value="{{ $user->email }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="role">Role:</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="role">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->roles->first()->id ? 'selected' : ''}}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="role">Kota:</label>
                    <div class="col-sm-10">
                        <select id="kota" class="form-control" name="kota">
                            @foreach ($kotas as $kota)
                                @if (@isset(Auth::user()->kotas->first()->id))
                                    <option value="{{ $kota->id }}" {{ $kota->id === Auth::user()->kotas->first()->id ? 'selected' : '' }}>{{ $kota->nama }}</option>
                                @else
                                    <option value="{{ $kota->id }}">{{ $kota->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="password">Password:</label>
                    <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Isi bila ingin mengganti password">
                    </div>
                </div>

                <hr>

                <button type="submit" class="pull-right btn btn-success">Simpan</button>

            </form>
        </div>
    </div>
@endsection
