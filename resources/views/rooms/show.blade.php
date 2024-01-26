@extends('dashboard.layouts.main')

@section('container')

<div class="container border-bottom">
    <h1 class="mt-3 pb-2">{{ $room->name }}</h1>
</div>

<div class="card mt-3">
    <div class="row">
      <div class="col-md-4">
        @if ($room->image)
        <img src="{{ asset('storage/'. $room->image) }}" class="img-fluid rounded-start" alt="user-image">
        @else
        <img src="/images/pexels-zaksheuskaya-1561020.jpg" class="img-fluid rounded-start" alt="user-image">
        @endif
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">{{ $room->name }}</h5>
          <p class="card-text">{{ $room->price }}</p>
          <a href="/rooms" class="m-4 text-decoration-none btn btn-primary position-absolute bottom-0 end-0"><i class="bi bi-arrow-return-right"></i></a>
        </div>
      </div>
    </div>
  </div>

@endsection