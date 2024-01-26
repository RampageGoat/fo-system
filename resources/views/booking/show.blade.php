@extends('dashboard.layouts.main')

@section('container')

<div class="container border-bottom">
    <h1 class="mt-3 pb-2">Booking</h1>
</div>

<div class="card mt-3">
    <div class="row">
      <div class="col-md-4">
        @if ($booking->room->image)
        <img src="{{ asset('storage/'. $booking->room->image) }}" class="img-fluid rounded-start" alt="user-image">
        @else
        <img src="/images/pexels-zaksheuskaya-1561020.jpg" class="img-fluid rounded-start" alt="user-image">
        @endif
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <p class="card-text text-end">Book ID : {{ $booking->id }}</p>
          <h5 class="card-title fs-3 text-center">{{ $booking->customers->name }}</h5>
          <p class="card-text">Tipe Kamar : {{ $booking->room->name }}</p>
          <p class="card-text">Jumlah Kamar : {{ $booking->numOfRoom }}</p>
          <p class="card-text">Check In : {{ $booking->checkIn }}</p>
          <p class="card-text">Check Out : {{ $booking->checkOut }}</p>
          <p class="card-text fs-4 text-end">Total : {{ $booking->priceSum }}</p>
          <p class="card-text"><small class="text-body-secondary"></small></p>
        </div>
      </div>
    </div>
    <div class="p-3 bg-secondary-subtle border-top text-center">
      <form action="/booking/{{ $booking->id }}/cancel" method="post" class="d-inline">
        @method('put')
        @csrf
          <button type="submit" name="btnCancel" value="Cancel" class="btn btn-danger border-0"><i class="bi bi-x-lg"></i> Batalkan</button>
      </form>
      <form action="/booking/{{ $booking->id }}/done" method="post" class="d-inline">
        @method('put')
        @csrf
          <button type="submit" name="btnDone" value="Done" class="btn btn-success border-0 ms-2"><i class="bi bi-check2"></i> Selesai</button>
      </form>
      <a href="/booking" class="text-decoration-none btn btn-primary ms-2"><i class="bi bi-arrow-return-right"></i> Kembali</a>
    </div>
  </div>

@endsection