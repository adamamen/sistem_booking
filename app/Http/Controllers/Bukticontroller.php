<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bukti;
use App\Models\Notif;
use Illuminate\Http\Request;

class Bukticontroller extends Controller
{
    function index()
    {
        $data = Bukti::select('booking.*', 'bukti.*')->join('booking', 'bukti.id_booking', 'booking.id')->get();
        return view('bukti.index', ['data' => $data]);
    }

    function post(Request $request)
    {
        // dd($request->all());
        Bukti::whereid($request->id)->update([
            'flag' => $request->flag
        ]);

        $lastnumb = Booking::select('no_antrian', 'open')->wheretanggal($request->tgl)->orderby('no_antrian', 'desc')->first();
        (!empty($lastnumb)) ? $lastnumbf = $lastnumb->no_antrian : $lastnumbf = '0';

        if ($request->flag == '1') {
            Booking::whereid($request->id)->update([
                'no_antrian' => $lastnumbf + 1
            ]);
            $nextant = $lastnumbf + 1;
            Notif::insert([
                'id_pasien' => $request->idpas,
                'descript' => 'PEMBAYARAN SUDAH VALID NO ANTRIAN ANDA ADALAH ' . $nextant,
                'flag_open' => '0',
            ]);

            $antr = $lastnumbf - 1;
            $datapasien1 = Booking::select('*')->whereno_antrian($lastnumbf)->wheretanggal(date('d-m-Y'))->whereflag('1')->whereopen('1')->first();
            $dataop = Booking::select('*')->whereno_antrian($nextant)->whereopen('1')->first();
            // $dataop1 = Booking::select('*')->whereno_antrian($nextant)->whereopen('1')->first();
            if ($datapasien1) {
                # code...
                Notif::insert([
                    'id_pasien' => $request->idpas,
                    'descript' => 'GILIRAN ANDA',
                    'flag_open' => '0',
                ]);
            } elseif (empty($lastnumbf) && $dataop) {
                Notif::insert([
                    'id_pasien' => $request->idpas,
                    'descript' => 'GILIRAN ANDA',
                    'flag_open' => '0',
                ]);
            }

            if (!empty($lastnumbf)) {
                # code...
                $datapasien = Booking::select('*')->whereno_antrian($lastnumbf)->wheretanggal(date('d-m-Y'))->whereflag('0')->whereopen('0')->first();
                if ($datapasien) {
                    # code...
                    Notif::insert([
                        'id_pasien' => $request->idpas,
                        'descript' => 'ANTRIAN ANDA AKAN DIPANGGIL UNTUK SELANJUTNYA',
                        'flag_open' => '0',
                    ]);
                }
            }
        } else {
            Notif::insert([
                'id_pasien' => $request->idpas,
                'descript' => 'Segera lakukan pembayaran & upload bukti pembayaran dengan benar',
                'flag_open' => '1',
            ]);
        }

        return response()->json(['status' => true]);
    }

    function not_sccs()
    {
        return redirect(route('buktia.index'))->with('mssg', 'Data berhasil diperbarui');
    }
}
