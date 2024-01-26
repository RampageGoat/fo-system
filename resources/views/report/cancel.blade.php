@extends('dashboard.layouts.main')

@section('container')

<h1 class="border-bottom mt-3 pb-2">Report</h1>

@if(session()->has('success'))
  <div class="alert alert-success mt-4" role="alert">
    {{ session('success') }}
  </div>
@endif

<div class="container mb-5">

   <ul class="nav nav-tabs nav-justified mt-3">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('report') ? 'active' : ''}}" href="/report"><h4>Done</h4></a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('cancel') ? 'active' : ''}}" href="/cancel"><h4>Canceled</h4></a>
        </li>
      </ul>
    
    <div class="table">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe Kamar</th>
                <th scope="col">C/I</th>
                <th scope="col">C/O</th>
                <th scope="col">Rate</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($booking->where('status', 3) as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->customers->name }}</td>
                    <td>{{ $b->room->name }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkIn)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkOut)) }}</td>
                    <td>{{ $b->priceSum}}</td>
                    <td>
                      <a href="/report/{{ $b->id }}" class="btn btn-sm btn-primary" id="print-button"><i class="bi bi-printer"></i> Print</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    
</div>

@endsection