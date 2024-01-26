@extends('dashboard.layouts.main')

@section('container')

<div class="container col-lg-8 mt-4">
    <h1 class="border-bottom border-3 my-3 pb-2">Add Booking</h1>

    <form method="post" action="/booking">
      @csrf
      {{-- Customers Form --}}
      <h6 class="text-center pb-2 border-bottom">Customer</h6>
      <div class="mb-3">
          <label for="customers_id" class="form-label">Nama</label>
          <select class="form-select" name="customers_id" id="customer" onchange="clickSearch(this.value)">
            <option value="" selected>Pilih Customers</option>
            @foreach ($customers as $c)
              @if(old('customers_id') == $c->id)
                <option value="{{ $c->id }}">{{ $c->name }}</option>
              @else
                <option value="{{ $c->id }}">{{ $c->name }}</option>
              @endif
            @endforeach
          </select>
      </div>
      <div class="content p-0" id="content">
        <div class="row">
          <div class="mb-3 col-md">
            <label for="nik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="nik" name="nik" value="">
          </div>
          <div class="mb-3 col-md">
            <label for="gender" class="form-label">Jenis Kelamin</label>
            <input type="text" class="form-control" id="gender" name="gender" value="">
          </div>
        </div>
        <div class="row">
          <div class="mb-3 col-md">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" value="">
          </div>
          <div class="mb-3 col-md">
            <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
            <input type="text" class="form-control" id="ttl" name="ttl" value="">
          </div>
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" value="">
        </div>
      </div>

      {{-- Room Form --}}
      <h6 class="text-center pb-2 border-bottom mt-5">Room</h6>
      <div class="row">
        <div class="mb-3 col-md">
          <label for="room_id" class="form-label">Tipe Kamar</label>
          <select class="form-select" name="room_id" id="room" onchange="getPrice(this.value)">
            <option value="" selected>Pilih Tipe Kamar</option>
            @foreach ($rooms as $r)
                <option value="{{ $r->id }}">{{ $r->name }}</option>
            @endforeach
          </select>
        </div>
        <div class="price col-md" id="price">
          <div class="mb-3">
            <label for="price" class="form-label">Rate</label>
            <input type="text" class="form-control" name="price" value="" readonly>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="mb-3 col-md-2">
          <label for="numOfRoom" class="form-label">Jumlah Kamar</label>
          <input type="number" class="form-control @error('numOfRoom') is-invalid @enderror" id="numOfRoom" name="numOfRoom" value="{{ old('numOfRoom') }}">
          @error('numOfRoom')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md">
          <label for="checkIn" class="form-label">Check In</label>
          <input type="date" class="form-control @error('checkIn') is-invalid @enderror" id="checkIn" name="checkIn" value="{{ old('checkIn') }}">
          @error('checkIn')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
        <div class="mb-3 col-md">
          <label for="checkOut" class="form-label">Check Out</label>
          <input type="date" class="form-control col-auto @error('checkOut') is-invalid @enderror" id="checkOut" name="checkOut" value="{{ old('checkOut') }}">
          @error('checkOut')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>
      </div>
      <div class="mb-3">
        <label for="priceSum" class="form-label">Total Price</label>
        <input type="text" class="form-control @error('priceSum') is-invalid @enderror" id="priceSum" name="priceSum" value="">
        @error('priceSum')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="note" class="form-label">Note</label>
        <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="{{ old('note') }}">
        @error('note')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      {{-- <div class="mb-3">
        <label for="gender" class="form-label">Status</label>
        <select class="form-select" name="gender"> 
          <option value="Active">Active</option>
          <option value="Canceled">Canceled</option>
          <option value="Done">Done</option>
        </select>
      </div> --}}

      <button type="submit" class="btn btn-primary mb-5 float-end">Book</button>
    </form>

    <script src="/js/search.js"></script>
    <script src="/js/price.js"></script>

  </div>
    
@endsection