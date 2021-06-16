<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bukti;
use App\Models\Notif;
use App\Models\Swab;
use App\Models\Userclient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Indexcontroller extends Controller
{
    function index_admin()
    {
        $data = Userclient::all();
        return view('pasien.index', ['data' => $data]);
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
        $data = Userclient::select('*')->whereid(Auth::guard('client')->user()->id)->first();
        return view('front.booking.index', ['data' => $data]);
    }

    function antrian_index()
    {
        return view('front.antrian.index');
    }

    function antrian_data()
    {
        $cek = Booking::select('*')->where('flag', '0')->whereid_pasien(Auth::guard('client')->user()->id)->wheretanggal(date('d-m-Y'))->whereNotNull('no_antrian')->get()->toArray();

        $datasisa = Booking::select('*')->where('flag', '0')->orderby('no_antrian', 'asc')->wheretanggal(date('d-m-Y'))->whereNotNull('no_antrian')->get()->toArray();
        $dataall = Booking::select('*')->orderby('created_at', 'asc')->wheretanggal(date('d-m-Y'))->get()->whereNotNull('no_antrian')->toArray();
        // dd($cek);
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

    function bukti_index()
    {
        $data = Bukti::select('booking.*', 'bukti.*')->join('booking', 'bukti.id_booking', 'booking.id')->where('booking.id_pasien', Auth::guard('client')->user()->id)->get();
        return view('front.bukti.index', ['data' => $data]);
    }

    function post_bukti(Request $request)
    {
        // dd($request->all());
        $files = $request->file('file');
        $gname = Str::random(10) . '.' . $files->getClientOriginalExtension();
        $move = $files->move('uploads/', $gname);
        if ($move) {
            Bukti::whereid($request->id)->update([
                'files' => $gname
            ]);

            return redirect(route('bukti.index'))->with('status', true)->with('mssg', 'Upload Berhasil');
        }
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

        $cek = Booking::select('*')->whereid_pasien($request->id_pasien)->where('tanggal', $request->tanggal)->first();
        if ($request->tanggal < date('d-m-Y')) {
            return redirect()->route('bookingc.index')->with(['status' => true, 'mssg' => 'Tidak dapat booking tanggal tersebut']);
        } elseif ($cek) {
            return redirect()->route('bookingc.index')->with(['status' => true, 'mssg' => 'Anda sudah booking sebelumnya']);
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
        // $booking->no_antrian = $lastnumbf + 1;
        $booking->open = $open;
        $booking->harga = $request->harga;
        $booking->jenis = $request->jenis;
        $booking->save();

        Userclient::whereid($request->id_pasien)->update([
            'book_flag' => '1'
        ]);

        $idbook = Booking::select('id')->whereid_pasien($request->id_pasien)->wheretanggal($request->tanggal)->first();
        Bukti::insert([
            'id_booking' => $idbook->id,
            'codepembayaran' => Str::random(10),
            'files' => '',
            'flag' => '0',
            'created_at' => Carbon::now()
        ]);
        Notif::insert([
            'id_pasien' => $request->id_pasien,
            'descript' => 'Segera lakukan pembayaran & upload bukti pembayaran dengan benar',
            'flag_open' => '1',
        ]);

        return redirect()->route('bookingc.index')->with(['status1' => true, 'mssg' => 'Data booking telah diterima ']);
    }

    function get_notif()
    {
        $data = Notif::select('notif.id', 'userclient.name', 'notif.descript')->whereid_pasien(Auth::guard('client')->user()->id)->join('userclient', 'notif.id_pasien', 'userclient.id')->get();

        return view('front.ndata', ['data' => $data]);
    }
    function get_notifj()
    {
        $data = Notif::whereid_pasien(Auth::guard('client')->user()->id)->join('userclient', 'notif.id_pasien', 'userclient.id')->get()->toArray();

        return view('front.jdata', ['data' => $data]);
    }

    function delete_notif(Request $request)
    {
        $flag = Notif::select('flag_open')->whereid($request->id)->first();
        $a = Notif::where('id', $request->id)->delete();

        if ($a) {
            return response()->json(['stat' => true, 'flag' => $flag->flag_open]);
        } else {
            return response()->json(['stat' => false, 'flag' => $flag->flag_open]);
        }
    }
}
