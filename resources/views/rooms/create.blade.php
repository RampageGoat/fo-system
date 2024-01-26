@extends('dashboard.layouts.main')

@section('container')

<div class="container col-lg-8 mt-4">
    <h1 class="border-bottom border-3 my-3 pb-2">Add Rooms</h1>

    <form method="post" action="/rooms" class="mb-5" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        <label for="price" class="form-label">Harga</label>
      <div class="input-group mb-3">
        <span class="input-group-text">Rp.</span>
        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}">
        <span class="input-group-text">.00</span>
        @error('price')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="description" class="form-label">Deskripsi</label>
      <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
      @error('description')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
      <label for="image" class="form-label">Upload Gambar</label>
      <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
    </div>
    @error('image')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
      <button type="submit" class="btn btn-primary mt-3 float-end">Add Room Type</button>
    </form>
</div>
    
@endsection