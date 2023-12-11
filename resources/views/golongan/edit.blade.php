@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <h5>{{ $title }}</h5>
      <div class="col-sm-6">
        <form class="row g-3 mt-4" action="" method="POST">
          <input type="hidden" name="_method" value="PUT">
          @csrf

          <div class="form-group">
            <label for="kode" class="form-label">Kode*</label>
            <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" id="kode" value="{{ $golongan->kode }}" placeholder="Kode">
            @error('kode')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <label for="nama" class="form-label">Nama*</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ $golongan->nama }}" placeholder="Nama">
            @error('nama')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>

          <div class="form-group">
            <button class="btn btn-success float-end" type="submit">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
