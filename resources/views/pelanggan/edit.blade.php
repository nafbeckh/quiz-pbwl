@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <h5>{{ $title }}</h5>
      <form class="mt-4" action="" method="POST">
        <input type="hidden" name="_method" value="PUT">
        @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group mb-3">
              <label for="id_gol" class="form-label">Golongan*</label>
              <select class="form-control @error('id_gol') is-invalid @enderror" name="id_gol" id="id_gol">
                <option value="">-- Pilih --</option>
                @foreach($golongans as $golongan)
                <option value="{{ $golongan->id }}" {{ $pelanggan->id_gol == $golongan->id ? 'selected' : ''}}>{{ $golongan->nama }}</option>
                @endforeach
              </select>
              @error('id_gol')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama*</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $pelanggan->nama }}" placeholder="Nama">
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="alamat" class="form-label">Alamat*</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">{{ $pelanggan->alamat }}</textarea>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="no_hp" class="form-label">No HP*</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ $pelanggan->no_hp }}" placeholder="No HP">
              @error('no_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group mb-3">
              <label for="ktp" class="form-label">No KTP*</label>
              <input type="text" class="form-control @error('ktp') is-invalid @enderror" name="ktp" id="ktp" value="{{ $pelanggan->ktp }}" placeholder="No KTP">
              @error('ktp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="seri" class="form-label">Seri*</label>
              <input type="text" class="form-control @error('seri') is-invalid @enderror" name="seri" id="seri" value="{{ $pelanggan->seri }}" placeholder="Seri">
              @error('seri')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="meteran" class="form-label">Meteran*</label>
              <input type="text" class="form-control @error('meteran') is-invalid @enderror" name="meteran" id="meteran" value="{{ $pelanggan->meteran }}" placeholder="Meteran">
              @error('meteran')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="id_user" class="form-label">User*</label>
              <select class="form-control @error('id_user') is-invalid @enderror" name="id_user" id="id_user">
                <option value="">-- Pilih --</option>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $pelanggan->id_user == $user->id ? 'selected' : ''}}>{{ $user->nama }}</option>
                @endforeach
              </select>
              @error('id_user')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="status" class="form-label">Status*</label>
              <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                <option value="Aktif" {{ $pelanggan->status == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                <option value="Tidak Aktif" {{ $pelanggan->status == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <button class="btn btn-success float-end" type="submit">Simpan</button>
            </div>

          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
