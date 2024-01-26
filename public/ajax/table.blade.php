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
                  <a href="/customers/{{ $c->id }}" class="badge bg-primary"><span data-feather="eye"></span></a>
                  <a href="/customers/{{ $c->id }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
                  <form action="/customers/{{ $c->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('apakah anda yaki ingin menghapus data ini ?')"><span data-feather="x-circle"></span></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
        </table>