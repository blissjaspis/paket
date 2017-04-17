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
            Show User
        </div>

        <div class="panel-body">
            <form class="form-horizontal">

                <div class="form-group">
                    <label class="col-sm-5 control-label" for="name">Nama:</label>
                    <div class="col-sm-6">
                        <p class="text-block">{{ $user->name }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label" for="email">Email:</label>
                    <div class="col-sm-6">
                        <p class="text-block">{{ $user->email }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label" for="role">Role:</label>
                    <div class="col-sm-6">
                        <p class="text-block">{{ $user->roles->first()->name }}</p>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-5 control-label" for="role">Kota:</label>
                    <div class="col-sm-6">
                        <p class="text-block">{{ isset($user->kotas->first()->nama) ? $user->kotas->first()->nama : '-' }}</p>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
