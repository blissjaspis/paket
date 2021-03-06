<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kota;
use App\User;
use App\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('user.index', ['users' => User::latest()->get()]);
    }

    public function create()
    {
        return view('user.create', ['roles' => Role::get(), 'kotas' => Kota::get()]);
    }

    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $user->attachRole($request->role);
        $user->kotas()->attach($request->kota);
        $user->save();

        return redirect()->route('user.index')->withSuccess('Berhasil Menambahkan User!');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::get();
        $kotas = Kota::get();
        return view('user.edit', compact('user', 'roles', 'kotas'));
    }

    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        ! $request->has('password') ?: $user->password = bcrypt($request->password);

        $user->syncRoles([$request->role]);
        $user->kotas()->sync([$request->kota]);

        $user->save();
        return redirect()->route('user.index')->withSuccess('Berhasil Mengupdate User!');
    }
}
