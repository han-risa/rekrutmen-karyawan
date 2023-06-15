<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKandidatRequest;
use App\Http\Requests\UpdateKandidatRequest;
use Session;
use URL;

class SeleksiController extends Controller
{
    public function deviation(Request $request) {
        $item = Kandidat::all();
        $d=array();
        foreach($item as $code_A=>$name_A){
            $d[$code_A]=array();
            foreach($item as $code_B=>$name_B){
                if($code_A!=$code_B){
                    $d[$code_A][$code_B]=array();
                    foreach($subs as $sub=>$v){
                        $d[$code_A][$code_B][$sub]=abs($data[$code_A][$sub]-$data[$code_B][$sub]);
                    }
                }
            }
        }
    }
}
