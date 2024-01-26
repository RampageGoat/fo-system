@extends('dashboard.layouts.main')

@section('container')

<div class="container border-bottom">
    <h1 class="mt-3 pb-2">Customers</h1>
</div>

<div class="card mt-3">
    <div class="row">
      <div class="col-md-4">
        <img src="/images/pexels-zaksheuskaya-1561020.jpg" class="img-fluid rounded-start" alt="user-image">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text">{{ $customers->nik }}</p>
          <h5 class="card-title">{{ $customers->name }}</h5>
          <p class="card-text">{{ $customers->gender }}</p>
          <p class="card-text">{{ $customers->telepon }}</p>
          <p class="card-text">{{ $customers->ttl }}</p>
          <p class="card-text">{{ $customers->alamat }}</p>
          <p class="card-text"><small class="text-body-secondary"></small></p>
          <a href="/customers" class="m-4 text-decoration-none btn btn-primary position-absolute bottom-0 end-0"><i class="bi bi-arrow-return-right"></i></a>
        </div>
      </div>
    </div>
  </div>

@endsection