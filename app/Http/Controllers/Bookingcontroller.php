<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Bookingcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Booking::all();
        return view('booking.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required'
        ]);

        $booking = new Booking();
        $booking->nama = $request->nama;
        $booking->jenis_kelamin = $request->jenis_kelamin;
        $booking->umur = $request->umur;
        $booking->alamat = $request->alamat;
        $booking->tanggal = $request->tanggal;
        $booking->save();

        return redirect()->route('booking.index')
            ->with('success', 'Booking created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if ($request->id == null) {
            Booking::whereid($request->id)->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'tanggal' => $request->tanggal
            ]);
        } else {
            Booking::whereid($request->id)->update([
                'nama' => $request->nama,
                'jenis_kelamin' => $request->jenis_kelamin,
                'umur' => $request->umur,
                'alamat' => $request->alamat,
                'tanggal' => $request->tanggal
            ]);
        }
        return redirect()->route('booking.index')
            ->with('success', 'Booking edited successfully.');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        $pasien = Booking::find($booking->id);
        $pasien->delete();
        return response()->json(['alertdelete' => true]);
    }

    function get_edit(Request $request)
    {

        $data = Booking::select('*')->whereid($request->id)->first();

        return view('booking.modaledit', ['data' => $data]);
    }

    function src_booking(Request $request)

    {
        $book = Booking::select('*')->whereid($request->id)->first();
        $book = Booking::select('*')->whereid($request->id)->first();
        return response()->json($book);
        return response()->json($book);
    }
}
