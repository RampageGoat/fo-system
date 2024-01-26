@extends('dashboard.layouts.main')

@section('container')
<div class="container border-bottom">
  <a href="/rooms/create" class="btn btn-success float-end mt-2"><i class="bi bi-plus-lg"></i> Add Rooms</a>
  {{-- <button type="button" class="btn btn-success float-end mt-2"><i class="bi bi-plus-lg"></i> Add Rooms</button> --}}
<h1 class="mt-3 pb-2">Rooms</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="row row-cols-1 g-4 my-2">
  {{-- <div class="alert alert-primary mt-4" role="alert">
    <p>Note : data yang sudah di tambahkan tidak boleh dihapus</p>
  </div> --}}
  @foreach($room as $r)
    <div class="col">
      {{-- <div class="card h-100">
        <div class="card-body">
          <h5 class="card-title">{{ $r->name }}</h5>
          <p class="card-text">{{ $r->description }}</p> 
          <p class="card-text"><small class="text-body-primary">@money($r->price)</small></p>
          <form action="/rooms/{{ $r->id }}" method="post" class="d-inline">
            @method('delete')
            @csrf
              <button class="btn btn-danger float-end ms-2 border-0" onclick="return confirm('apakah anda yaki ingin menghapus data ini ?')"><i class="bi bi-trash"></i></span></button>
          </form>
           <a href="/rooms/{{ $r->id }}" class="btn btn-warning float-end border-0 ms-2"><i class="bi bi-pencil-square"></i></a>
          <a href="/rooms/{{ $r->id }}/edit" class="btn btn-primary float-end border-0"><i class="bi bi-pencil-square"></i></a>
        </div>
      </div> --}}

      <div class="card">
        <div class="row g-0">
          <div class="col-md-2">
            @if ($r->image)
            <img src="{{ asset('storage/'. $r->image) }}" class="img-fluid rounded-start" alt="user-image">
            @else
            <img src="/images/pexels-zaksheuskaya-1561020.jpg" class="img-fluid rounded-start" alt="user-image">
            @endif
            {{-- <img src="/images/pexels-zaksheuskaya-1561020.jpg" class="img-fluid rounded-start" alt="user-image"> --}}
          </div>
          <div class="col-md-10">
            <div class="card-body">
              <h5 class="card-title">{{ $r->name }}</h5>
              <p class="card-text">{{ $r->description }}</p> 
              <p class="card-text"><small class="text-body-primary">Rp. @money($r->price)</small></p>
              {{-- <form action="/rooms/{{ $r->id }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                  <button class="btn btn-danger float-end ms-2 border-0" onclick="return confirm('apakah anda yaki ingin menghapus data ini ?')"><i class="bi bi-trash"></i></span></button>
              </form> --}}
              {{-- <a href="/rooms/{{ $r->id }}" class="btn btn-warning float-end border-0 ms-2"><i class="bi bi-pencil-square"></i></a> --}}
              <a href="/rooms/{{ $r->id }}/edit" class="btn btn-primary float-end border-0"><i class="bi bi-pencil-square"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

@endsection