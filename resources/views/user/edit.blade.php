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
              <label for="password" class="form-label">Password*</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
              @error('password')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="nama" class="form-label">Nama*</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $user->nama }}" placeholder="Nama">
              @error('nama')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="alamat" class="form-label">Alamat*</label>
              <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" placeholder="Alamat">{{ $user->alamat }}</textarea>
              @error('alamat')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="no_hp" class="form-label">No HP*</label>
              <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" value="{{ $user->no_hp }}" placeholder="No HP">
              @error('no_hp')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
          </div>
          
          <div class="col-sm-6">
            <div class="form-group mb-3">
              <label for="kode_pos" class="form-label">Kode Pos*</label>
              <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" id="kode_pos" value="{{ $user->kode_pos }}" placeholder="Kode Pos">
              @error('kode_pos')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="role" class="form-label">Role*</label>
              <select class="form-control @error('role') is-invalid @enderror" name="role" id="role">
                <option value="1" {{ $user->role == 1 ? 'selected' : ''}}>Admin</option>
                <option value="0" {{ $user->role == 0 ? 'selected' : ''}}>User</option>
              </select>
              @error('role')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <label for="status" class="form-label">Status*</label>
              <select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
                <option value="Aktif" {{ $user->status == 'Aktif' ? 'selected' : ''}}>Aktif</option>
                <option value="Tidak Aktif" {{ $user->status == 'Tidak Aktif' ? 'selected' : ''}}>Tidak Aktif</option>
              </select>
              @error('status')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="form-group mb-3">
              <button class="btn btn-success float-end" type="submit">Edit</button>
            </div>
            
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
