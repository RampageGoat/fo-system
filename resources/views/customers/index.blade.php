@extends('dashboard.layouts.main')

@section('container')

<div class="container border-bottom">
<a href="/customers/create" class="btn btn-success float-end mt-2"><i class="bi bi-plus-lg"></i> Add Customers</a>
<h1 class="mt-3 pb-2">Customers</h1>
</div>

@if(session()->has('success'))
  <div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="container-sm mt-2">
  <form action="/customers" method="get">
    @csrf
    <div class="input-group my-4">
      <input type="text" name="keyword" class="form-control" placeholder="Cari....." id="keyword" autocomplete="off" autofocus>
      <button class="btn btn-secondary" name="search" type="submit" id="search"><i class="bi bi-search"></i></button>
      {{-- <div class="input-group-prepend">
        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
      </div> --}}
    </div>
  </form>

    <div class="table" id="container">
        <table class="table table-hover table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">No Telp</th>
                <th scope="col">TTL</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody class="table-group-divider">
              @foreach($customers as $c)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $c->name }}</td>
                <td>{{ $c->gender }}</td>
                <td>{{ $c->telepon }}</td>
                <td>{{ $c->ttl }}</td>
                <td>
                  <a href="/customers/{{ $c->id }}" class="badge bg-primary"><i class="bi bi-eye"></i></a>
                  <a href="/customers/{{ $c->id }}/edit" class="badge bg-warning"><i class="bi bi-pen"></i></a>
                  <form action="/customers/{{ $c->id }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yaki ingin menghapus data ini ?')"><i class="bi bi-trash"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-end">
      {{ $customers->links() }}
    </div>

    {{-- <script src="js/script.js"></script> --}}

    {{-- Live search Tipe 2 (Berhasil)--}}
    {{-- <script type="text/javascript">
      $(document).ready(function(){
 
      fetch_customer_data();

      function fetch_customer_data(query = '')
      {
        $.ajax({
              url:"{{ route('customers.search') }}",
              method:'GET',
              data:{query:query},
              dataType:'json',
              success:function(data)
              {
                  $('tbody').html(data.table_data);
              }
          })
      }

        $(document).on('keyup', '#keyword', function(){
            var query = $(this).val();
            fetch_customer_data(query);
        });
      });
    </script> --}}

</div>


@endsection