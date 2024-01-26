<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use App\Models\RoomTypes;
use App\Models\Booking;
use App\Charts\CobaChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index2()
    {
        $query = Booking::where('room_id', '=', 1)->get();
        
        $room = RoomTypes::orderBy('id')->get('name');

        $total = Booking::join('room_types', 'bookings.room_id', '=', 'room_types.id')
                        ->select('room_types.id as rom_id', 'room_types.name as rom_name') 
                        ->selectRaw('sum(bookings.numOfRoom) as sum')
                        ->where('status', '=', 1)
                        ->groupBy('room_types.id')
                        ->orderBy('room_types.id')
                        ->get();
    
        return view('test.index2', [
            'title' => 'Test 1',
            'query' => $query,
            'total' => $total,
            'room' => $room
        ]);
    }

    public function index()
    {
        // Cara ke 1 untuk menentukan filter tanggal
        $date1 = new Carbon('first day of December 2023');
        $date2 = new Carbon('last day of December 2023');

        // Cara ke 2 untuk menentukan filter tanggal
        $date3 = Carbon::create(2023, 12, 1);
        $date4 = Carbon::create(2023, 12, 31);
        
        $query = Test::with('room')->orderBy('last_seen')->whereDate('tests.last_seen', '>=', $date1)->whereDate('tests.last_seen', '<=', $date2)->get();
        
        // Query untuk menampilkan label dibawah chart
        $room = RoomTypes::orderBy('id')->get('name');

        // Query untuk menghitung data didalam database
        $value = Test::join('room_types', 'tests.room_id', '=', 'room_types.id')
                     ->select('room_types.id as id', 'room_types.name as name', DB::raw("count(tests.room_id) as count"))
                     ->whereDate('tests.last_seen', '>=', $date1)
                     ->whereDate('tests.last_seen', '<=', $date2)
                     ->groupBy('room_types.id')
                     ->orderBy('room_types.id')
                     ->get();

        return view('test.index', [
            'title' => 'Test',
            'test' => $query,
            'room' => $room,
            'value' => $value,
            'date' => [$date3, $date4]
        ]);
    }

    public function chart()
    {
        // Laravel Chart ConsoleTV
        $chart = new CobaChart;
        $chart->labels(['One', 'Two', 'Three', 'Four']);
        $chart->dataset('My dataset', 'line', [1, 2, 3, 4]);
        $chart->dataset('My dataset 2', 'line', [4, 3, 2, 1]);

        // Livewire Chart
        $columnChartModel = (new ColumnChartModel())
                            ->setTitle('Expenses by Type')
                            ->addColumn('Food', 100, '#f6ad55')
                            ->addColumn('Shopping', 200, '#fc8181')
                            ->addColumn('Travel', 300, '#90cdf4');
        
        // $room1 = RoomTypes::where('id', $this->id[0])->value('name');
        // $room2 = RoomTypes::where('id', $this->id[1])->value('name');
        // $room3 = RoomTypes::where('id', $this->id[2])->value('name');
        // $room4 = RoomTypes::where('id', $this->id[3])->value('name');
        // $room5 = RoomTypes::where('id', $this->id[4])->value('name');
        
        // $value1 = Test::where('room_id', $this->id[0])->count();
        // $value2 = Test::where('room_id', $this->id[1])->count();
        // $value3 = Test::where('room_id', $this->id[2])->count();
        // $value4 = Test::where('room_id', $this->id[3])->count();
        // $value5 = Test::where('room_id', $this->id[4])->count();
        
        // $lineChartModel = (new LineChartModel())
        //                     ->addPoint($room1, $value1, '#f6ad55')
        //                     ->addPoint($room2, $value2, '#fc8181')
        //                     ->addPoint($room3, $value3, '#90cdf4')
        //                     ->addPoint($room4, $value4, '#5fd93d')
        //                     ->addPoint($room5, $value5, '#e85ab4')
        //                     ->withGrid();

    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
