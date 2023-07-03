<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use App\Models\Skor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreKandidatRequest;
use App\Http\Requests\UpdateKandidatRequest;
use PhpParser\Node\Stmt\For_;
use Session;
use URL;

class SeleksiController extends Controller
{
    public function deviation(Request $request)
    {
        $item = Skor::all();
        $namas = Kandidat::all();
        $nama = array();
        $c1Max = Skor::max('komunikasi');
        $c2Max = Skor::max('kerjasama');
        $c3Max = Skor::max('kejujuran');
        $c4Max = Skor::max('interpersonal');
        $c1Min = Skor::min('komunikasi');
        $c2Min = Skor::min('kerjasama');
        $c3Min = Skor::min('kejujuran');
        $c4Min = Skor::min('interpersonal');
        $this->console_log($item);
        $this->console_log($c1Max);
        $c1 = array();
        $c2 = array();
        $c3 = array();
        $c4 = array();
        $itemRow = $item->count();
        $eMax = log($itemRow);
        $k = 1 / $eMax;
        $entWeight = $this->entropy();

        $i = 0;
        foreach ($namas as $val) {
            $nama[$i] = $val->nama;
            $i++;
        }

        $i = 0;
        if ($i < 1) {
            foreach ($item as $val) {
                $c1[$i] = $val->komunikasi;
                $c2[$i] = $val->kerjasama;
                $c3[$i] = $val->kejujuran;
                $c4[$i] = $val->interpersonal;
                $i++;
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1);
        $c = array($c1, $c2, $c3, $c4);
        $cMin = array($c1Min, $c2Min, $c3Min, $c4Min);
        $cMax = array($c1Max, $c2Max, $c3Max, $c4Max);
        $this->console_log($cMax);
        $this->console_log($cMin);
        $this->console_log($c);
        for ($i = 0; $i < 4; $i++) {
            $this->console_log($cMax[$i]-$cMin[$i]);
        }
        $d=array();
        for($i = 0; $i < 4; $i++) {
            $d[$i]=array();
            for($j = 0; $j < $itemRow; $j++) {
                $d[$i][$j]=array();
                $d[$i][$j]=(($c[$i][$j]-$cMin[$i]) / ($cMax[$i]-$cMin[$i]));
            }
        }
        $this->console_log($d);

        $b=array();
        for($i = 0; $i < $itemRow; $i++) {
            $b[$i]=array();
            for($j = 0; $j < $itemRow; $j++) {
                if($i!=$j){
                    $b[$i][$j]=array();
                    for($k = 0; $k < 4; $k++) {
                        $b[$i][$j][$k]=($d[$k][$i]-$d[$k][$j]);
                    }
                }
            }
        }
        $this->console_log($b);

        $x=array();
        for($i = 0; $i < $itemRow; $i++) {
            $x[$i]=array();
            for($j = 0; $j < $itemRow; $j++) {
                if($i!=$j){
                    $x[$i][$j]=array();
                    $x[$i][$j][4] = 0;
                    for($k = 0; $k < 4; $k++) {
                        if($b[$i][$j][$k] < 0) {
                            $x[$i][$j][$k] = 0;
                            $x[$i][$j][4] += $x[$i][$j][$k];
                        } else {
                            $x[$i][$j][$k] = $b[$i][$j][$k] * $entWeight[$k];
                            $x[$i][$j][4] += $x[$i][$j][$k];
                        }
                    }
                }
            }
        }
        $this->console_log($x);

        $y=array();
        for($i = 0; $i < $itemRow; $i++) {
            $y[$i] = 0;
            for($j = 0; $j < $itemRow; $j++) {
                if($i!=$j){
                    $y[$i] += $x[$i][$j][4];
                }
            }
        }
        $this->console_log($y);

        $z=array();
        for($i = 0; $i < $itemRow; $i++) {
            $z[$i] = 0;
            for($j = 0; $j < $itemRow; $j++) {
                if($i!=$j){
                    $z[$i] += $x[$j][$i][4];
                }
            }
        }
        $this->console_log($z);

        $posFlow = array();
        $negFlow = array();
        for($i = 0; $i < $itemRow; $i++) {
            $posFlow[$i] = (1 / ($itemRow-1)) * $y[$i];
            $negFlow[$i] = (1 / ($itemRow-1)) * $z[$i];
            $netFlow[$i] = $posFlow[$i] - $negFlow[$i];
        }
        $result = array($nama, $posFlow, $negFlow, $netFlow);
        $ordered_values = $result[3];
        rsort($ordered_values);
        $result[4] = $netFlow;
        for ($i = 0; $i < $itemRow; $i++) {
            for ($j = 0; $j < $itemRow; $j++) {
                if ($result[3][$i] === $ordered_values[$j]) {
                    $result[4][$i] = ($j + 1);
                    break;
                }
            }
        }
        $this->console_log($result);
        $this->console_log($nama);
        return view("pages.ranking",[
            'title' => 'Hasil Kalkulasi PROMETHEE',
            'item' => $item,
            'c' => $c,
            'x' => $x,
            'y' => $y,
            'z' => $z,
            'result' => $result,
            'b' => $b,
            'd' => $d,
            'entWeight' => $entWeight,
            'nama' => $nama
        ]);
        // return $this->preference($d);
    }

    public function entropy()
    {
        $item = Skor::all();
        $c1Max = Skor::max('komunikasi');
        $c2Max = Skor::max('kerjasama');
        $c3Max = Skor::max('kejujuran');
        $c4Max = Skor::max('interpersonal');
        $this->console_log($item);
        $this->console_log($c1Max);
        $c1 = array();
        $c2 = array();
        $c3 = array();
        $c4 = array();
        $itemRow = $item->count();
        $eMax = log($itemRow);
        $k = 1 / $eMax;

        $i = 0;
        if ($i < 1) {
            foreach ($item as $val) {
                $c1[$i] = $val->komunikasi / $c1Max;
                $c2[$i] = $val->kerjasama / $c2Max;
                $c3[$i] = $val->kejujuran / $c3Max;
                $c4[$i] = $val->interpersonal / $c4Max;
                $i++;
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1);
        $c = array($c1, $c2, $c3, $c4);
        $this->console_log($c);

        $c1Sum = array_sum($c1);
        $c2Sum = array_sum($c2);
        $c3Sum = array_sum($c3);
        $c4Sum = array_sum($c4);
        $this->console_log($c1Sum);
        $this->console_log($c2Sum);

        $c1nor = array();
        $c2nor = array();
        $c3nor = array();
        $c4nor = array();

        $i = 0;
        if ($i < 1) {
            for ($i=0; $i < $itemRow; $i++) {
                $c1nor[$i] = $c1[$i] / $c1Sum;
                $c2nor[$i] = $c2[$i] / $c2Sum;
                $c3nor[$i] = $c3[$i] / $c3Sum;
                $c4nor[$i] = $c4[$i] / $c4Sum;
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1nor);

        $cnor = array($c1nor, $c2nor, $c3nor, $c4nor);

        $c1tor = array();
        $c2tor = array();
        $c3tor = array();
        $c4tor = array();

        $i = 0;
        if ($i < 1) {
            for ($i=0; $i < $itemRow; $i++) {
                $c1tor[$i] = $c1nor[$i] * (log($c1nor[$i]));
                $c2tor[$i] = $c2nor[$i] * (log($c2nor[$i]));
                $c3tor[$i] = $c3nor[$i] * (log($c3nor[$i]));
                $c4tor[$i] = $c4nor[$i] * (log($c4nor[$i]));
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1tor);
        $ctor = array($c1tor, $c2tor, $c3tor, $c4tor);

        $cSemi = array();
        $cSemi[0] = $k * array_sum($c1tor);
        $cSemi[1] = $k * array_sum($c2tor);
        $cSemi[2] = $k * array_sum($c3tor);
        $cSemi[3] = $k * array_sum($c4tor);
        $this->console_log($cSemi);

        $entWeight = array();
        for ($i=0; $i < 4; $i++) {
            $entWeight[$i] = (1/(4-array_sum($cSemi))*(1-$cSemi[$i]));
        }
        $this->console_log($entWeight);
        $this->console_log(array_sum($entWeight));
        return $entWeight;
    }


    function console_log($output, $with_script_tags = true)
    {
        $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
            ');';
        if ($with_script_tags) {
            $js_code = '<script>' . $js_code . '</script>';
        }
        echo $js_code;
    }

    public function manualEntropy()
    {
        $item = Skor::all();
        $c1Max = Skor::max('komunikasi');
        $c2Max = Skor::max('kerjasama');
        $c3Max = Skor::max('kejujuran');
        $c4Max = Skor::max('interpersonal');
        $this->console_log($item);
        $this->console_log($c1Max);
        $c1 = array();
        $c2 = array();
        $c3 = array();
        $c4 = array();
        $itemRow = $item->count();
        $eMax = log($itemRow);
        $k = 1 / $eMax;

        $i = 0;
        if ($i < 1) {
            foreach ($item as $val) {
                $c1[$i] = $val->komunikasi / $c1Max;
                $c2[$i] = $val->kerjasama / $c2Max;
                $c3[$i] = $val->kejujuran / $c3Max;
                $c4[$i] = $val->interpersonal / $c4Max;
                $i++;
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1);
        $c = array($c1, $c2, $c3, $c4);
        $this->console_log($c);

        $c1Sum = array_sum($c1);
        $c2Sum = array_sum($c2);
        $c3Sum = array_sum($c3);
        $c4Sum = array_sum($c4);
        $this->console_log($c1Sum);
        $this->console_log($c2Sum);

        $c1nor = array();
        $c2nor = array();
        $c3nor = array();
        $c4nor = array();

        $i = 0;
        if ($i < 1) {
            for ($i=0; $i < $itemRow; $i++) {
                $c1nor[$i] = $c1[$i] / $c1Sum;
                $c2nor[$i] = $c2[$i] / $c2Sum;
                $c3nor[$i] = $c3[$i] / $c3Sum;
                $c4nor[$i] = $c4[$i] / $c4Sum;
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1nor);

        $cnor = array($c1nor, $c2nor, $c3nor, $c4nor);

        $c1tor = array();
        $c2tor = array();
        $c3tor = array();
        $c4tor = array();

        $i = 0;
        if ($i < 1) {
            for ($i=0; $i < $itemRow; $i++) {
                $c1tor[$i] = $c1nor[$i] * (log($c1nor[$i]));
                $c2tor[$i] = $c2nor[$i] * (log($c2nor[$i]));
                $c3tor[$i] = $c3nor[$i] * (log($c3nor[$i]));
                $c4tor[$i] = $c4nor[$i] * (log($c4nor[$i]));
            }
        } else {
            return $this->manualEntropy();
        }
        $this->console_log($c1tor);
        $ctor = array($c1tor, $c2tor, $c3tor, $c4tor);

        $cSemi = array();
        $cSemi[0] = $k * array_sum($c1tor);
        $cSemi[1] = $k * array_sum($c2tor);
        $cSemi[2] = $k * array_sum($c3tor);
        $cSemi[3] = $k * array_sum($c4tor);
        $this->console_log($cSemi);

        $entWeight = array();
        for ($i=0; $i < 4; $i++) {
            $entWeight[$i] = (1/(4-array_sum($cSemi))*(1-$cSemi[$i]));
        }
        $this->console_log($entWeight);
        $this->console_log(array_sum($entWeight));
        return view("pages.entropy",[
            'title' => 'Tahapan Entropy',
            'item' => $item,
            'c' => $c,
            'cnor' => $cnor,
            'ctor' => $ctor,
            'entWeight' => $entWeight
        ]);
    }
}
