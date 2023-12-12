<?php

namespace App\Http\Controllers;

use App\Http\Requests\PelangganCreateRequest;
use App\Http\Requests\PelangganUpdateRequest;
use App\Models\Golongan;
use App\Models\Pelanggan;
use App\Models\User;
use Carbon\Carbon;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggans = Pelanggan::with('golongan', 'user')->get();

        return view('pelanggan.index', compact('pelanggans'))->with('title', 'Pelanggan');
    }

    public function create()
    {
        $golongans = Golongan::select('id', 'nama')->get();
        $users = User::select('id', 'nama')->get();

        return view('pelanggan.create', compact('golongans', 'users'))->with('title', 'Tambah Pelanggan');
    }

    public function store(PelangganCreateRequest $request)
    {
        $data = $request->validated();

        $pelanggan = new Pelanggan($data);
        $pelanggan->save();

        return redirect('pelanggan');
    }

    public function edit(string $id)
    {
        $golongans = Golongan::select('id', 'nama')->get();
        $users = User::select('id', 'nama')->get();
        $pelanggan = Pelanggan::findOrFail($id);

        return view('pelanggan.edit', compact('golongans', 'users', 'pelanggan'))->with('title', 'Edit Pelanggan');
    }

    public function update(PelangganUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->updated_at = Carbon::now();
        $pelanggan->update($data);

        return redirect('pelanggan');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id)->delete();
        if (!$pelanggan) {
            return false;
        }

        return true;
    }
}
