<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Swab;
use App\Models\Userclient;
use Illuminate\Http\Request;

class Swabcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dswab = Swab::select('booking.*', 'swab.id as id_swab', 'swab.hasil as hasil')->join('booking', 'swab.id_booking', 'booking.id')->get();
        // dd($dswab);
        foreach ($dswab as $dswabs) {
            $idswab[] = $dswabs->id;
        }
        $dbook = Booking::select('*')->whereflag('1')->whereNotIn('id', $idswab)->get();
        // dd($dbook);
        return view('swab.index', ['data' => $dswab, 'dbook' => $dbook]);
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
        $swab = new Swab();
        $swab->id_booking = $request->booking;
        $swab->hasil = $request->hasil;
        $swab->save();

        return redirect()->route('swab.index')
            ->with('success', 'Hasil created successfully.');
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
        Swab::whereid($request->id)->update([
            'hasil' => $request->hasil
        ]);
        return redirect()->route('swab.index')
            ->with('success', 'Booking edited successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Swab $swab)
    {
        $swab = Swab::find($swab->id);
        $swab->delete();
        return response()->json(['alertdelete' => true]);
    }

    function get_edit(Request $request)
    {

        $data = Swab::select('*')->whereid($request->id)->first();
        // dd($request->id);
        return view('swab.modaledit', ['data' => $data]);
    }
}
