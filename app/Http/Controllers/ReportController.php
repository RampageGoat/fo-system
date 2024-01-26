<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('report.done', [
            'title' => 'Report',
            'booking' => Booking::with(['room', 'customers'])->orderBy('checkIn')->get()
        ]);
    }
    
    public function cancel()
    {
        return view('report.cancel', [
            'title' => 'Report',
            'booking' => Booking::with(['room', 'customers'])->orderBy('checkIn')->get()
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
    public function show($bookings)
    {
        return view('report.print', [
            'title' => 'Report',
            'booking' => Booking::find($bookings),
            'tanggal' => Carbon::now()->translatedFormat('d F Y'),
        ]);
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
