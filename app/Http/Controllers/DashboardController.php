<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoomTypes;
use App\Models\Booking;
use App\Models\Customers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $day = Carbon::today();

        $date1 = new Carbon('first day of January 2024');
        $date2 = new Carbon('last day of January 2024');

        $room = RoomTypes::orderBy('id')->get('name');

        // Query untuk mengambil jumlah kamar yang check in hari ini
        $daily = Booking::rightJoin('room_types', 'bookings.room_id', '=', 'room_types.id')
                        ->select('room_types.id as rom_id', 'room_types.name as rom_name') 
                        ->selectRaw('sum(bookings.numOfRoom) as sum')
                        ->where('status', '=', 1)
                        ->whereDate('bookings.checkIn', '=', $day)
                        ->groupBy('room_types.id')
                        ->orderBy('room_types.id')
                        ->get();
        
        // Query untuk menghitung total booking harian
        $daily1 = Booking::where('status', '=', 1)
                        ->whereDate('checkIn', '=', $day)
                        ->sum('numOfRoom');

        // Query untuk menghitung total booking harian
        $daily2 = Booking::where('status', '=', 2)
                        ->whereDate('checkIn', '=', $day)
                        ->sum('numOfRoom');
        
        // Query untuk menghitung proyeksi pendapatan hari ini
        $daily3 = Booking::where('status', '=', 1)
                        ->whereDate('checkIn', '=', $day)
                        ->sum('priceSum');
            
        // Query untuk menghitung proyeksi pendapatan hari ini
        $daily4 = Booking::where('status', '=', 2)
                        ->whereDate('checkIn', '=', $day)
                        ->sum('priceSum');

        // Query untuk mengambil jumlah kamar yang akan checkin pada minggu ini
        $weekly = RoomTypes::rightJoin('bookings', 'room_types.id', '=', 'bookings.room_id')
                        ->select('room_types.id', 'room_types.name') 
                        ->selectRaw('SUM(bookings.numOfRoom) as sum')
                        ->where('status', '=', 2)
                        ->whereDate('bookings.checkIn', '=', $day)
                        ->groupBy('room_types.id')
                        ->orderBy('room_types.id')
                        ->get();

        // Query untuk mengambil jumlah kamar yang terjual di bulan ini
        $monthly = Booking::join('room_types', 'bookings.room_id', '=', 'room_types.id')
                        ->select('room_types.id as rom_id', 'room_types.name as rom_name') 
                        ->selectRaw('sum(bookings.numOfRoom) as sum')
                        ->where('status', '=', 2)
                        ->whereDate('bookings.checkIn', '>=', $date1)
                        ->whereDate('bookings.checkIn', '<=', $date2)
                        ->groupBy('room_types.id')
                        ->orderBy('room_types.id')
                        ->get();

        // Query untuk menghitung jumlah total pelanggan
        $customer = Customers::count('id');

        return view('dashboard.index', [
            "title" => "Dashboard",
            "name" => User::all(),
            'room' => $room,
            'daily' => $daily,
            'daily1' => $daily1,
            'daily2' => $daily2,
            'daily3' => $daily3,
            'daily4' => $daily4,
            'weekly' => $weekly,
            'monthly' => $monthly,
            'day' => $day,
            'customer' => $customer
        ]);
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

    //This fuction is only for reserving a code snippet
    public function chartTest()
    {

    }
}
