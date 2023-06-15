<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SkorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $item = Kandidat::where('nama', 'LIKE', '%' .$request->search. '%')->paginate(5);
        } else {
            $item = Kandidat::paginate(5);
        }
        return view('pages.skor', compact('item'));
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
             'item' => Kandidat::find($id),
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
            'komunikasi' => 'required',
            'kerjasama' => 'required',
            'kejujuran' => 'required',
            'interpersonal' => 'required',
        ]);

        $user = Kandidat::find($id);
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
