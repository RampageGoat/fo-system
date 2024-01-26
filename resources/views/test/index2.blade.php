@extends('dashboard.layouts.main')

@section('container')

{{-- ChartJs Original --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

<h2 class="mt-3">Database Query Test</h2>
<div class="query">

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
                  @foreach($query->where('status', 1) as $b)
                <tr>
                    <td>{{ $b->id }}</td>
                    <td>{{ $b->customers->name }}</td>
                    <td>{{ $b->room->name ?? '' }}</td>
                    <td>{{ $b->numOfRoom }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkIn)) }}</td>
                    <td>{{ date('d/m/Y', strtotime($b->checkOut)) }}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="sum">
            <div class="m-3" style="height: 500px;"><canvas id="chartJS"></canvas></div>
            <p>{{ $total }}</p>
            <script>
                const room = {!! $room !!}
                const data = {!! $total !!};
                console.log(data);
                console.log(room);

                const config = {
                type: 'bar',
                data: {
                labels: room.map(row => row.name),
                datasets: [
                        {
                        label: 'Penjualan Kamar',
                        data: data.map(row => row.sum),
                        backgroundColor: '#36A2EB'
                        },
                    ]
                },
                options: {
                    animation: true
                }
            };

            new Chart(document.getElementById('chartJS'), config);
            </script>
        </div>
    </div>

</div>

{{-- <div class="card mb-5">
    <div class="card-body">
        <h5>Menampilkan data penjualan harian</h5>
    </div>
    <div class="chart">
        <div class="m-3" style="height: 500px;"><canvas id="chartJS"></canvas></div>
        {{-- <script type="module" src="/js/chartJS.js"></script> --}}
        {{-- <script>
            const data = {!! $room !!};
            const value = {!! $value !!};
            console.log(value);
            console.log(data);

            const config = {
                type: 'bar',
                data: {
                labels: data.map(row => row.name),
                datasets: [
                        {
                        label: 'Penjualan Kamar',
                        data: value.map(row => row.count),
                        backgroundColor: '#36A2EB'
                        },
                    ]
                },
                options: {
                    animation: true
                }
            };

            new Chart(document.getElementById('chartJS'), config);
        </script>
    </div>

    {{-- <div class="chart" style="height: 500px">
        {!! $chart1->container() !!}
        {!! $chart1->script() !!}
    </div> --}}

    {{-- <div class="chart m-3" style="height: 500px">
        <livewire:livewire-line-chart
        {{-- key="{{ $columnChartModel->reactiveKey() }}" --}}
        {{-- :line-chart-model="$chart" /> --}}

        {{-- <livewire:scripts /> --}}
        {{-- @livewireChartsScripts --}}
    {{-- </div>
</div> --}}

{{-- Chart By Laravel Daily --}}
{{-- <div class="chart mb-5">
    <div class="card">
        <div class="card-body">
            <h1>{{ $chart->options['chart_title'] }}</h1>
            <hr>
            {!! $chart->renderHtml() !!}
        
            {!! $chart->renderChartJsLibrary() !!}
            {!! $chart->renderJs() !!}
        </div>
    </div>
</div> --}}
</div>

@endsection