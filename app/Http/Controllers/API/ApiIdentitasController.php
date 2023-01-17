<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class ApiIdentitasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ident = Identitas::get();
        return response()->json([
            'data' => $ident
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $iden = Identitas::findOrFail($id);
        $iden->update([
            'nama_app' => $request->nama_app,
            'alamat_app' => $request->alamat_app,
            'email_app' => $request->email_app,
            'nomor_hp' => $request->nomor_hp,
            'foto' => $request->foto
        ]);

        return response()->json([
            'data' => $iden
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $iden = Identitas::findOrFail($id);
        $iden->delete();

        return response()->json([
            'msg' => 'Berhasil delete data'
        ]);
    }
}
