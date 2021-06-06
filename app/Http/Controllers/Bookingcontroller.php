<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Userclient;
use Carbon\Carbon;
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
        $user = Userclient::select('*')->wherebook_flag('0')->get();
        return view('booking.index', ['data' => $data, 'user' => $user]);
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
            'tanggal' => 'required',
            'id_pasien' => 'required'
        ]);

        $lastnumb = Booking::select('no_antrian', 'open')->wheretanggal($request->tanggal)->orderby('no_antrian', 'desc')->first();
        dd($lastnumb);
        Userclient::whereid($request->id_pasien)->update([
            'book_flag' => '1'
        ]);

        $nama = Userclient::select('nama')->whereid($request->nama)->first();

        (!empty($lastnumb)) ? $lastnumbf = $lastnumb->no_antrian : $lastnumbf = '0';
        (!empty($lastnumb)) ? $open = $lastnumb->open : $open = '0';
        $booking = new Booking();
        $booking->nama = $nama->nama;
        $booking->jenis_kelamin = $request->jenis_kelamin;
        $booking->umur = $request->umur;
        $booking->alamat = $request->alamat;
        $booking->tanggal = $request->tanggal;
        $booking->id_pasien = $request->nama;
        $booking->created_at = Carbon::now();
        $booking->flag = '0';
        $booking->no_antrian = $lastnumbf + 1;
        $booking->open = $open;
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
        $book = Booking::find($booking->id);
        $book->delete();
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
        return response()->json($book);
    }
}
