<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKandidatRequest;
use App\Http\Requests\UpdateKandidatRequest;
use Session;
use URL;

class KandidatController extends Controller
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
        return view('pages.kandidat', compact('item'));
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
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'noHp' => 'required',
        ]);


        Kandidat::create($validatedData); //untuk menyimpan data

        // toast('Registration has been successful','success');
        return redirect()->intended('/kandidat');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function show(Kandidat $kandidat)
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
        Session::put('requestReferrer', URL::previous());
        return view("pages.edit_kandidat",[
             'title' => 'User - Edit Kandidat',
             'item' => Kandidat::find($id),
            //  'skor' => Skor::find($id)
         ]);
    }

    public function update(Request $request, $id)
    {
        $validatedData=$request->validate([
            'nama' => 'required',
            'jenisKelamin' => 'required',
            'alamat' => 'required|min:5',
            'email' => 'required',
            'noHp' => 'required',
        ]);

        $user = Kandidat::find($id);
        $user->nama = $request->nama;
        $user->jenisKelamin = $request->jenisKelamin;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->noHp = $request->noHp;
        $user->save();

        // return $this->index();
        return redirect(Session::get('requestReferrer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kandidat  $kandidat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Kandidat::destroy($id);
         // Session::flash('hapussuccess', 'Data berhasil dihapus!');
         // toast('Your data has been deleted!','success');
         return redirect("/kandidat"); // untuk diarahkan kemana
    }
}
