<?php

namespace App\Http\Controllers;

use App\Models\Skor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.skor',[
            'item' => DB::table('kandidats')->paginate(10),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.create_kandidat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKandidatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'komunikasi' => 'required',
            'kerjasama' => 'required',
            'kejujuran' => 'required',
            'interpersonal' => 'required',
        ]);


        Kandidat::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/skor');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(Skor $kandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("pages.edit_skor",[
             'title' => 'User - Edit Kandidat',
             'item' => Skor::find($id),
         ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKandidatRequest  $request
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'noHp' => 'required',
            'komunikasi' => 'required',
            'kerjasama' => 'required',
            'kejujuran' => 'required',
            'interpersonal' => 'required',
        ]);

        $user = Skor::find($id);
        $user->komunikasi = $request->komunikasi;
        $user->kerjasama = $request->kerjasama;
        $user->kejujuran = $request->kejujuran;
        $user->interpersonal = $request->interpersonal;
        $user->save();

        return redirect()->intended('/skor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kandidat::destroy($id);
         // Session::flash('hapussuccess', 'Data berhasil dihapus!');
         // toast('Your data has been deleted!','success');
         return redirect("/skor"); // untuk diarahkan kemana
    }
}
