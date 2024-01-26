<head>
  <title>Hotel Management | {{ $title }}</title>
  
  {{-- Boostrap CSS --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">

  {{-- Boostrap Icons --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  {{-- jQuery Script --}}
  <script type="text/javascript" src="/js/jquery-3.7.0.min.js"></script>
  <script type="text/javascript" src="/js/jQuery.print.js"></script>

  {{-- Custom Styles --}}
  <link rel="stylesheet" href="/css/print.css">
</head>

<body>
  <div class="button">
    <div class="m-5">
      <div class="hstack gap-3">
        <button class="btn btn-primary" id="print-button" onclick="window.print()"><i class="bi bi-printer"></i> Print</a></button>
        <div class="vr"></div>
        <a href="/report" class="btn btn-primary"><i class="bi bi-arrow-return-right"> Kembali</i></a>
      </div>
    </div>
  </div>

  <div class="invoice" id="printable">
    <div class="row">
      <div class="col">
        <img src="/images/logo.png" alt="riverwalk">
      </div>
      <div class="col-4 mt-4">
        <h1>Invoice</h1>
        <p>Book ID : {{ $booking->id }}</p>
        <p>Date : {{ $tanggal }}</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col">
        <p>Kepada :</p>
        <p>{{ $booking->customers->name }}</p>
        <p class="lh-sm">{{ $booking->customers->alamat }}</p>
        <p>{{ $booking->customers->telepon }}</p>
      </div>
      <div class="col-2"></div>
      <div class="col-4">
        <p>Total :</p>
        <h4>{{ $booking->priceSum }}</h4>
        <h4>Rp. @money($booking->priceSum)</h4>
      </div>
    </div>
    <div class="table mt-5">
      <table class="table">
          <thead>
          <tr>
              <th scope="col">Tipe Kamar</th>
              <th scope="col">Harga</th>
              <th scope="col">Jumlah Kamar</th>
              <th scope="col">Total</th>
          </tr>
          </thead>
          <tbody class="table-group-divider">
            <tr>
                <td>{{ $booking->room->name }}</td>
                <td>{{ $booking->room->price }}</td>
                <td>{{ $booking->numOfRoom }}</td>
                <td>{{ $booking->priceSum }}</td>
            </tr>
          </tbody>
      </table>
    </div>
    <div class="row mt-5"></div>
    <div class="row mt-5">
      <div class="col">
      </div>
      <div class="col-4" id="ttd">
        <p>Front Office</p>
        <p>Front Office Agent</p>
      </div>
    </div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5"></div>
    <div class="row mt-5">
        <div class="col-5">
          <p>Contact :</p>
          <p>Jl. Gedung Nasional No.16B</p>
          <p>082286178367</p>
        </div>
    </div>
</div>

    
</body>
