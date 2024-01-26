@extends('login.plugin.plugin')


@section('container')
<div class="row justify-content-center">
    <div class="col-md-5">
      @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
          {{ session('loginError') }}
        </div>
      @endif

      <main class="form-signin w-100 m-auto">
        <h1 class="text-center mt-5"><i class="bi bi-buildings"></i></h1>
        <h1 class="h3 mb-3 fw-normal text-center">Login</h1>
          <form action="/" method="post">
            @csrf
            <div class="form-floating">
              <input type="username" class="form-control @error('username') is-invalid @enderror" name="username" id="username" placeholder="Username" autofocus required value="{{ old('username') }}">
              <label for="username">Username</label>
              @error('username')
                <div class="invalid-feedback mb-2">
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="form-floating">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
              <label for="password">Password</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          </form>
    </div>
</div>
@endsection