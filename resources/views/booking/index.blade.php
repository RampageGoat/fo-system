@extends('dashboard.layouts.main')

@section('container')

<div class="container border-bottom">
  <a href="/booking/create" class="btn btn-success float-end mt-2"><i class="bi bi-plus-lg"></i> Add Booking</a>
  <h1 class="mt-3 pb-2">Booking</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
  </div>
@endif

{{-- <div class="cards my-3">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
          <div class="card border border-0">
            <div class="card-body text-bg-success rounded-4">
              <h5 class="card-title">Occupied</h5>
              <h1 class="text-end">10</h1>
              <p class="card-text text-end">Rooms</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card border border-0">
            <div class="card-body text-bg-primary rounded-4">
              <h5 class="card-title">Vacant Clean Inspected</h5>
              <h1 class="text-end fs-1">10</h1>
              <p class="card-text text-end">Rooms</p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card border border-0">
            <div class="card-body text-bg-danger rounded-4">
              <h5 class="card-title">Out Of Orders</h5>
              <h1 class="text-end">10</h1>
              <p class="card-text text-end">Rooms</p>
            </div>
          </div>
        </div>
    </div>
</div> --}}

<div class="container-sm mt-4">

    <div class="container mb-5">
        <div class="table">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Book ID</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Tipe Kamar</th>
                    <th scope="col">Jumlah<br>Kamar</th>
                    <th scope="col">C/I</th>
                    <th scope="col">C/O</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($booking->where('status', 1) as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->customers->name }}</td>
                    <td>{{ $b->room->name ?? '' }}</td>
                    <td>{{ $b->numOfRoom }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkIn)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkOut)) }}</td>
                    <td>
                      <a href="/booking/{{ $b->id }}" class="badge bg-primary"><i class="bi bi-eye" style="font-size: 15px"></i></a>
                      {{-- <a href="/booking/{{ $b->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a> --}}
                      {{-- <form action="/customers/{{ $c->id}}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yaki ingin menghapus data ini ?')"><span data-feather="x-circle"></span></button>
                      </form> --}}
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end">
      {{ $booking->links() }}
    </div>   
    
</div>

@endsection