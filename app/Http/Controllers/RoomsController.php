<?php

namespace App\Http\Controllers;

use App\Models\RoomTypes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //clear
    {
        return view('rooms.index', [
            'title' => 'Rooms',
            'room' => RoomTypes::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() //clear
    {
        return view('rooms.create', [
            'title' => 'Rooms'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) //clear
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:room_types',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required'
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('room-images');
        }

        RoomTypes::create($validatedData);

        return redirect('/rooms')->with('success', 'Data kamar baru berhasil ditambakan !');
    }

    /**
     * Display the specified resource.
     */
    public function show($roomType) //clear
    {
        return view('rooms.show', [
            'title' => 'Rooms',
            'room' => RoomTypes::find($roomType)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($roomType) //clear
    {
        return view('rooms.edit', [
            'title' => 'Rooms',
            'room' => RoomTypes::find($roomType)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) //clear
    {
        $rules = [
            'name' => 'required',
            'price' => 'required',
            'image' => 'image|file|max:1024',
            'description' => 'required'
        ];

        // if($request->name != $roomType->name){
        //     $rules['name'] = 'required|unique:room_types';
        // }

        $validatedData = request()->validate($rules);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('room-images');
        }
        
        // RoomTypes::where('id', $roomType->id)->update($validatedData);
        RoomTypes::where('id', $id)->update($validatedData);

        return redirect('/rooms')->with('success', 'Data kamar berhasil diubah !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($roomType) //clear
    {
        DB::table('room_types')->delete($roomType);
        // RoomTypes::destroy($roomType->id);

        return redirect('/rooms')->with('success', 'Data kamar berhasil dihapus !');
    }
}
