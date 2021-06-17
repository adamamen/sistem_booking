<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\Userclient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Pasiencontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Userclient::all();
        return view('pasien.index', ['data' => $data]);
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
            'email' => 'required',
            'password' => 'required',
            'alamat' => 'required'
        ]);

        $pasien = new Userclient();
        $pasien->name = $request->nama;
        $pasien->email = $request->email;
        $pasien->password = Hash::make($request->password);
        $pasien->alamat = $request->alamat;
        $pasien->umur = $request->umur;
        $pasien->jenis_kelamin = $request->jenis_kelamin;
        $pasien->save();

        return redirect()->route('pasien.index')
            ->with('success', 'Pasien created successfully.');
        // return dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Userclient::select('*')->whereid($id)->first();
        return response()->json($data);
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
        // dd($request->all());
        if ($request->password == null) {
            Userclient::whereid($request->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'alamat' => $request->alamat,
                'umur' => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin
            ]);
        } else {
            Userclient::whereid($request->id)->update([
                'name' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'alamat' => $request->alamat,
                'umur' => $request->umur,
                'jenis_kelamin' => $request->jenis_kelamin
            ]);
        }
        return redirect()->route('pasien.index')
            ->with('success', 'Pasien edited successfully.');
        // dd($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userclient $pasien)
    {
        // dd($pasien);
        $pasien = Userclient::find($pasien->id);
        $pasien->delete();
        return response()->json(['alertdelete' => true]);
    }

    function get_edit(Request $request)
    {

        $data = Userclient::select('*')->whereid($request->id)->first();

        return view('pasien.modaledit', ['data' => $data]);
    }
}
