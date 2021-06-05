<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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

        return redirect()->route('antrian.index');
    }

    function open(Request $request)
    {
        Booking::wheretanggal($request->tanggal)->update([
            'open' => '1'
        ]);

        return redirect()->route('antrian.index');
    }
}
