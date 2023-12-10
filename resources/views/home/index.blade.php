@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-md-6">
    <h3>Selamat datang {{ auth()->user()->nama }}</h3>
  </div>
</div>
@endsection
