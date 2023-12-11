<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Pelanggan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereNotIn('id', [Auth::user()->id])->get();

        return view('user.index', compact('users'))->with('title', 'User');
    }

    public function create()
    {
        return view('user.create')->with('title', 'Tambah User');
    }

    public function store(UserCreateRequest $request)
    {
        $data = $request->validated();

        $user = new User($data);
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect('user');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'))->with('title', 'Edit User');
    }

    public function update(UserUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $user = User::findOrFail($id);
        if ($request->input('password') != '') {
            $user->password = Hash::make($request->input('password'));
        }

        $user->updated_at = Carbon::now();
        $user->update($data);

        return redirect('user');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::where('id_user', $id)->exists();
        if ($pelanggan) {
            return false;
        }

        $user = User::findOrFail($id)->delete();
        if (!$user) {
            return false;
        }

        return true;
    }
}
