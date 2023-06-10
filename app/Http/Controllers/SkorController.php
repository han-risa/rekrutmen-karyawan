<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skor;
use App\Http\Requests\StoreSkorRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateSkorRequest;

class SkorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSkorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSkorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Skor  $skor
     * @return \Illuminate\Http\Response
     */
    public function show(Skor $skor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Skor  $skor
     * @return \Illuminate\Http\Response
     */
    public function edit(Skor $skor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSkorRequest  $request
     * @param  \App\Models\Skor  $skor
     * @return \Illuminate\Http\Response
     */
    // Simpan Hasil Edit
    public function update(Request $request, $id){
        $validatedData=$request->validate([
            'namaLengkap' => 'required',
            'username' => 'required|min:5',
            'alamat' => 'required|min:5',
            'noHp' => 'required',
            'jenisKelamin' => 'required',
            'tempatLahir' => 'required',
            'tanggalLahir' => 'required',
        ]);

        // Menyimpan update
        $user = Dokter::find($id);
        $user->namaLengkap = $request->namaLengkap;
        $user->username = $request->username;
        $user->alamat = $request->alamat;
        $user->noHp = $request->noHp;
        $user->jenisKelamin = $request->jenisKelamin;
        $user->tempatLahir = $request->tempatLahir;
        $user->tanggalLahir = $request->tanggalLahir;
        $user->save();

        // toast('Your data has been saved!','success');
        return redirect("/dokter"); // untuk diarahkan kemana
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Skor  $skor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Skor $skor)
    {
        //
    }
}
