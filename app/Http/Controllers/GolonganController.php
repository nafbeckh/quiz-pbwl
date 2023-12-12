<?php

namespace App\Http\Controllers;

use App\Http\Requests\GolonganRequest;
use App\Models\Golongan;
use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\Client\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongans = Golongan::all();

        return view('golongan.index', compact('golongans'))->with('title', 'Golongan');
    }

    public function create()
    {
        return view('golongan.create')->with('title', 'Tambah Golongan');
    }

    public function store(GolonganRequest $request)
    {
        $data = $request->validated();

        $golongan = new Golongan($data);
        $golongan->save();

        return redirect('golongan');
    }

    public function edit(string $id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('golongan.edit', compact('golongan'))->with('title', 'Edit Golongan');
    }

    public function update(GolonganRequest $request, string $id)
    {
        $data = $request->validated();

        $golongan = Golongan::findOrFail($id);
        $golongan->updated_at = Carbon::now();
        $golongan->update($data);

        return redirect('golongan');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::where('id_gol', $id)->exists();
        if ($pelanggan) {
            return false;
        }

        $golongan = Golongan::findOrFail($id)->delete();
        if (!$golongan) {
            return false;
        }

        return true;
    }
}
