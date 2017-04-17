@extends('layouts.app')
@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    <li class="active">User</li>
</ol>
@endsection
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="pull-left">
                Tabel Users
            </div>
                <div class="pull-right">
                    <a href="{{ route('user.create')}}" class="btn btn-info">Create New</a>
                </div>
            <div class="clearfix"></div>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created</th>
                        <th>Status</th>
                        <th>Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at->formatLocalized('%d %B %Y') }}</td>
                            <td>{{ $user->roles->first()->name }}</td>
                            <td><a href="{{ route('user.show', $user) }}">View |</a><a href="{{ route('user.edit', $user) }}"> Edit |</a><a href="#">Delete</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada User!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
