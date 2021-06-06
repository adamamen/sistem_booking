<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Swab;
use App\Models\Userclient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        if (Auth::guard('client')->check()) {
            return redirect()->route('index');
        } else {
            return view('front.auth.login');
        }
    }

    function register_index()
    {
        return view('front.auth.register');
    }

    function booking_index()
    {
        return view('front.booking.index');
    }

    function antrian_index()
    {
        return view('front.antrian.index');
    }

    function antrian_data()
    {
        $cek = Booking::select('*')->where('flag', '0')->whereid_pasien(Auth::guard('client')->user()->id)->get()->toArray();

        $datasisa = Booking::select('*')->where('flag', '0')->orderby('no_antrian', 'asc')->wheretanggal(date('d-m-Y'))->get()->toArray();
        $dataall = Booking::select('*')->orderby('created_at', 'asc')->wheretanggal(date('d-m-Y'))->get()->toArray();
        // dd($datasisa);
        if (empty($cek)) {
            return false;
        } else {
            return view('front.antrian.card', ['datasisa' => $datasisa, 'dataall' => $dataall, 'mydata' => $cek]);
        }
    }

    function hasil_index()
    {
        $dswab = Swab::select('booking.*', 'swab.id as id_swab', 'swab.hasil as hasil')->join('booking', 'swab.id_booking', 'booking.id')->where('booking.id_pasien', Auth::guard('client')->user()->id)->get();

        return view('front.hasil.index', ['data' => $dswab]);
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

        $cek = Userclient::select('*')->whereid($request->id_pasien)->where('book_flag', '1')->first();
        if ($cek) {
            return redirect()->route('bookingc.index')->with(['status' => true, 'mssg' => 'anda sudah booking sebelumnya']);
        }

        $lastnumb = Booking::select('no_antrian', 'open')->wheretanggal($request->tanggal)->orderby('no_antrian', 'desc')->first();
        (!empty($lastnumb)) ? $lastnumbf = $lastnumb->no_antrian : $lastnumbf = '0';
        (!empty($lastnumb)) ? $open = $lastnumb->open : $open = '0';

        $booking = new Booking();
        $booking->nama = $request->nama;
        $booking->jenis_kelamin = $request->jenis_kelamin;
        $booking->umur = $request->umur;
        $booking->alamat = $request->alamat;
        $booking->tanggal = $request->tanggal;
        $booking->id_pasien = $request->id_pasien;
        $booking->created_at = Carbon::now();
        $booking->flag = '0';
        $booking->no_antrian = $lastnumbf + 1;
        $booking->open = $open;
        $booking->save();

        Userclient::whereid($request->id_pasien)->update([
            'book_flag' => '1'
        ]);

        return redirect()->route('bookingc.index')->with(['status1' => true, 'mssg' => 'Nomor antrian anda adalah ', 'no' => $lastnumbf + 1]);
    }
}
