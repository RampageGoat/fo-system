<div class="row">
    <div class="mb-3 col-md">
      <label for="nik" class="form-label">NIK</label>
      <input type="text" class="form-control" id="nik" name="nik" value="{{ $customers->nik }}" readonly>
    </div>
    <div class="mb-3 col-md">
      <label for="gender" class="form-label">Jenis Kelamin</label>
      <input type="text" class="form-control" id="gender" name="gender" value="{{ $customers->gender }}" readonly>
    </div>
  </div>
  <div class="row">
    <div class="mb-3 col-md">
      <label for="telepon" class="form-label">Nomor Telepon</label>
      <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $customers->telepon }}" readonly>
    </div>
    <div class="mb-3 col-md">
      <label for="ttl" class="form-label">Tempat Tanggal Lahir</label>
      <input type="text" class="form-control col-auto" id="ttl" name="ttl" value="{{ $customers->ttl }}" readonly>
    </div>
  </div>
  <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $customers->alamat }}" readonly>
  </div>