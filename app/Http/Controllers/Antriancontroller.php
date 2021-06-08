<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Notif;
use Illuminate\Http\Request;

class Antriancontroller extends Controller
{
    function index()
    {
        $datasisa = Booking::select('*')->where('flag', '0')->orderby('no_antrian', 'asc')->wheretanggal(date('d-m-Y'))->get()->toArray();
        $dataall = Booking::select('*')->orderby('created_at', 'asc')->wheretanggal(date('d-m-Y'))->get()->toArray();
        // dd($datasisa);
        return view('antrian.index', ['datasisa' => $datasisa, 'dataall' => $dataall]);
    }

    function post(Request $request)
    {
        Booking::whereid($request->id)->update([
            'flag' => '1'
        ]);

        $antr1 = $request->antrian + 1;
        $datapasien1 = Booking::select('*')->whereno_antrian($antr1)->wheretanggal(date('d-m-Y'))->first();
        if ($datapasien1) {
            # code...
            Notif::insert([
                'id_pasien' => $datapasien1->id_pasien,
                'descript' => 'GILIRAN ANDA',
                'flag_open' => '0',
            ]);
        }

        $antr = $request->antrian + 2;
        $datapasien = Booking::select('*')->whereno_antrian($antr)->wheretanggal(date('d-m-Y'))->first();
        if ($datapasien) {
            # code...
            Notif::insert([
                'id_pasien' => $datapasien->id_pasien,
                'descript' => 'ANTRIAN ANDA AKAN DIPANGGIL UNTUK SELANJUTNYA',
                'flag_open' => '0',
            ]);
        }

        return redirect()->route('antrian.index');
    }

    function open(Request $request)
    {
        Booking::wheretanggal($request->tanggal)->update([
            'open' => '1'
        ]);



        $datapasien = Booking::select('*')->whereno_antrian('1')->wheretanggal(date('d-m-Y'))->first();
        $antr = $datapasien->no_antrian + 1;
        $datanext = Booking::select('*')->whereno_antrian($antr)->wheretanggal(date('d-m-Y'))->first();
        // dd($antr);
        if ($datapasien) {
            Notif::insert([
                'id_pasien' => $datapasien->id_pasien,
                'descript' => 'GILIRAN ANDA',
                'flag_open' => '0',
            ]);
            # code...

        }

        if ($datanext) {
            Notif::insert([
                'id_pasien' => $datanext->id_pasien,
                'descript' => 'ANTRIAN ANDA AKAN DIPANGGIL UNTUK SELANJUTNYA',
                'flag_open' => '0',
            ]);
        }

        return redirect()->route('antrian.index');
    }
}
