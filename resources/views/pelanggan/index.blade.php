@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-body">
      <h5>{{ $title }}</h5>
      <a href="{{ route('pelanggan.create') }}" class="btn btn-primary mb-3 float-end">Tambah Baru</a>

      <table class="table table-hover table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col" class="text-center">No</th>
            <th scope="col">No pel</th>
            <th scope="col">Golongan</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No HP</th>
            <th scope="col">No KTP</th>
            <th scope="col">Seri</th>
            <th scope="col">Meteran</th>
            <th scope="col">User</th>
            <th scope="col">Status</th>
            <th scope="col" class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @php $no = 1; @endphp
          @foreach($pelanggans as $pel)
          <tr>
            <th class="text-center">{{ $no++ }}</th>
            <td>{{ $pel->no_pelanggan }}</td>
            <td>{{ $pel->golongan->nama }}</td>
            <td>{{ $pel->nama }}</td>
            <td>{{ $pel->alamat }}</td>
            <td>{{ $pel->no_hp }}</td>
            <td>{{ $pel->ktp }}</td>
            <td>{{ $pel->seri }}</td>
            <td>{{ $pel->meteran }}</td>
            <td>{{ $pel->user->nama }}</td>
            <td>{{ $pel->status }}</td>
            <td class="text-center">
              <a class="btn btn-primary btn-sm" href="{{ route('pelanggan.edit', $pel->id) }}">Edit</a>
              <a class="btn btn-danger btn-sm" href="#" data-id="{{ $pel->id }}" onclick="delete_(`{{ route('pelanggan.delete', $pel->id) }}`)">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@push('js')
<script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
<script>
  function delete_(url) {
    if (confirm('Are you sure?')) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': `{{ csrf_token() }}`
        }
      });

      $.ajax({
        type: "DELETE",
        url: url,
        success: function(result) {
          if (!result) {
            alert('Gagal menghapus data')
          }
          
          location.reload()
        }
      })
    }
  }
</script>
@endpush
