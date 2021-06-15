<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bukti;
use App\Models\Notif;
use App\Models\Userclient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $user = Userclient::all();
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
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required'
        ]);

        $cek = Booking::select('*')->whereid_pasien($request->nama)->where('tanggal', $request->tanggal)->first();
        if ($request->tanggal < date('d-m-Y')) {
            return redirect()->route('booking.index')
                ->with('success', 'Tidak dapat booking tanggal tersebut.');
        } elseif ($cek) {
            return redirect()->route('booking.index')
                ->with('success', 'Anda sudah booking sebelumnya.');
        }

        $lastnumb = Booking::select('no_antrian', 'open')->wheretanggal($request->tanggal)->orderby('no_antrian', 'desc')->first();
        // dd($lastnumb);
        Userclient::whereid($request->nama)->update([
            'book_flag' => '1'
        ]);

        $nama = Userclient::select('name')->whereid($request->nama)->first();

        (!empty($lastnumb)) ? $lastnumbf = $lastnumb->no_antrian : $lastnumbf = '0';
        (!empty($lastnumb)) ? $open = $lastnumb->open : $open = '0';
        $booking = new Booking();
        $booking->nama = $nama->name;
        $booking->jenis_kelamin = $request->jenis_kelamin;
        $booking->umur = $request->umur;
        $booking->alamat = $request->alamat;
        $booking->tanggal = $request->tanggal;
        $booking->id_pasien = $request->nama;
        $booking->created_at = Carbon::now();
        $booking->flag = '0';
        // $booking->no_antrian = $lastnumbf + 1;
        $booking->open = $open;
        $booking->harga = $request->harga;
        $booking->jenis = $request->jenis;
        $booking->save();

        $idbook = Booking::select('id')->whereid_pasien($request->nama)->wheretanggal($request->tanggal)->first();
        Bukti::insert([
            'id_booking' => $idbook->id,
            'codepembayaran' => Str::random(10),
            'files' => '',
            'flag' => '0',
            'created_at' => Carbon::now()
        ]);
        Notif::insert([
            'id_pasien' => $request->nama,
            'descript' => 'Segera lakukan pembayaran & upload bukti pembayaran dengan benar',
            'flag_open' => '1',
        ]);

        // dd($idbook);

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
