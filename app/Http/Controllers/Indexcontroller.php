<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Indexcontroller extends Controller
{
    function index_admin()
    {
        return view('index.index');
    }

    function index()
    {
        return view('front.index');
    }

    function login_index()
    {
        return view('front.auth.login');
    }

    function register_index()
    {
        return view('front.auth.register');
    }

    function booking_index()
    {
        return view('front.booking.index');
    }

    function antrial_index()
    {
        return view('front.antrian.index');
    }

    function hasil_index()
    {
        return view('front.hasil.index');
    }

    function booking_post(Request $request)
    {
        $rules = [
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'id_pasien' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('bookingc.index')->with(['status' => true, 'mssg' => 'Masukan data dengan benar']);
        }

        Booking::insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_pasien' => $request->id_pasien,
            'umur' => $request->umur,
            'alamat' => $request->alamat,
            'tanggal' => $request->tanggal,
            'flag' => '0'
        ]);

        return redirect()->route('bookingc.index')->with(['status1' => true, 'mssg' => 'Data booking berhasil diinput']);
    }
}
