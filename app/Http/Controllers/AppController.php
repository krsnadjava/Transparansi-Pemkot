<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Dana;
use App\Lembaga;
use App\Tag;

class AppController extends Controller
{
    public function index()
    {

        $colors = ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93", "#15B768", "#F5701D", "#E1AD2D", "#B5A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3"];
        $alphas = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "aa", "ab", "ac", "ad", "ae", "af", "ag", "ah", "ai", "aj", "ak"];
        if(session()->has('top')) {
            /* Tipe Dananya Apa */
            if(session()->has('dana')) {
                $jenis = session('dana');
            } else {
                $jenis = "belanja";
            }

            $years = DB::table('dana_lengkap')
                ->select(DB::raw('tahun'))
                ->where('tipe', ucwords($jenis))
                ->groupBy('tahun')
                ->get();
            for($i = 0; $i < count($years); $i++) {
                $years[$i] = $years[$i]->tahun;
            }

            $datas = [];

            for($i = 0; $i < count($years); $i++) {
                $temp = ['year' => $years[$i]];
                $results = DB::table('dana_lengkap')
                    ->select(DB::raw('nama_lembaga, uraian, nilai'))
                    ->where('tipe', ucwords($jenis))
                    ->where('tahun', $years[$i])
                    ->orderBy('nilai', 'desc')
                    ->take(10)
                    ->get();
                foreach ($results as $result) {
                    array_push($temp, $result);
                }
                array_push($datas, $temp);
            }
            $breadcrumb = "Top 10 | ".ucwords($jenis);
            //dd($datas);
            return view('monitor.top')
                ->withBreadcrumb($breadcrumb)
                ->withJenis($jenis)
                ->withDatas($datas)
                ->withColors($colors)
                ->withAlphas($alphas);
        } else {
            if(session()->has('filter')) {

                /* Tipe Dananya Apa */
                if(session()->has('dana')) {
                    $jenis = session('dana');
                } else {
                    $jenis = "belanja";
                }

                $breadcrumb = ucwords($jenis)." | ".ucwords(session('filter'));
                
                $years = [];
                $dataTables = [];

                if(session()->has('id')) {
                    $id = (int)session('id');
                    $breadcrumb = $breadcrumb." > ".ucwords(Lembaga::find($id)->nama);
                    $lemb = Lembaga::find($id);
                    $lembagas = [];
                    $datas = [];
                    $labels = [];
                    $years = DB::table('dana_lengkap')
                        ->select(DB::raw('tahun'))
                        ->where('tipe', ucwords($jenis))
                        ->where('golongan', session('filter'))
                        ->groupBy('tahun')
                        ->get();
                    for($i = 0; $i < count($years); $i++) {
                        $years[$i] = $years[$i]->tahun;
                    }

                    for($i = 0; $i < count($years); $i++) {
                        $temp = ['year' => $years[$i]];
                        $results = DB::table('dana_lengkap')
                            ->select(DB::raw('nilai as sum, uraian, tahun'))
                            ->where('tipe', ucwords($jenis))
                            ->where('nama_lembaga', $lemb->nama)
                            ->where('tahun', $years[$i])
                            ->where('level', 2)
                            ->get();
                        if($results != null) {
                            foreach ($results as $result) {
                                if(!in_array($result->uraian, $labels)) {
                                    array_push($labels, $result->uraian);
                                }
                                array_push($temp, $result->sum);
                            }
                        }
                        array_push($datas, $temp);
                    }

                    $tables = [];
                    for($i = 0; $i < count($years); $i++) {
                        $temp = [];
                        $results =  DB::table('dana_lengkap')
                            ->select(DB::raw('dana_id'))
                            ->where('tipe', ucwords($jenis))
                            ->where('tahun', $years[$i])
                            ->where('nama_lembaga', $lemb->nama)
                            ->where('level', 2)
                            ->get();
                        if($results != null) {
                            foreach ($results as $result) {
                                array_push($temp, $result->dana_id);
                            }
                        }
                        array_push($tables, $temp);
                    }

                    $realTables = [];
                    for($i = 0; $i < count($years); $i++) {
                        $temp = [];
                        for($j = 0; $j < count($tables[$i]); $j++) {
                            array_push($temp, $tables[$i][$j]);
                            if(count(Dana::find($tables[$i][$j])->children) > 0) {
                                foreach(Dana::find($tables[$i][$j])->children as $child) {
                                    array_push($temp, $child->id);
                                    if(count($child->children) > 0) {
                                        foreach($child->children as $child1) {
                                            array_push($temp, $child1->id);
                                            if(count($child1->children) > 0) {
                                                foreach($child1->children as $child2) {
                                                    array_push($temp, $child2->id);
                                                    if(count($child2->children) > 0) {
                                                        foreach($child2->children as $child3) {
                                                            array_push($temp, $child3->id);
                                                            if(count($child3->children) > 0) {
                                                                foreach($child3->children as $child4) {
                                                                    array_push($temp, $child4->id);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        array_push($realTables, $temp);
                    }
                    $tables = $realTables;
                    // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                    array_unshift($tables, null);
                    $tables = call_user_func_array('array_map', $tables);
                    for($i = 0; $i < count($tables); $i++) {
                        $tmp = [];
                        if(Dana::find($tables[$i][0])->level > 1) {
                            $tmp = ["nama"=>Dana::find($tables[$i][0])->uraian, "level" => (Dana::find($tables[$i][0])->level-2)];
                        } else {
                            $tmp = ["nama"=>Dana::find($tables[$i][0])->lembaga->nama, "level" => (Dana::find($tables[$i][0])->level-2)];
                        }
                        for($j = 0; $j < count($years); $j++) {
                            array_push($tmp, Dana::find($tables[$i][$j])->nilai);
                        }
                        array_push($dataTables, $tmp);
                    }
                } else {
                    $id = null;
                    $lembagas = Lembaga::where('golongan', session('filter'))->get();
                    $datas = [];
                    $labels = [];
                    $years = DB::table('dana_lengkap')
                        ->select(DB::raw('tahun'))
                        ->where('tipe', ucwords($jenis))
                        ->where('golongan', session('filter'))
                        ->groupBy('tahun')
                        ->get();
                    for($i = 0; $i < count($years); $i++) {
                        $years[$i] = $years[$i]->tahun;
                    }

                    for($i = 0; $i < count($years); $i++) {
                        $temp = ['year' => $years[$i]];
                        foreach($lembagas as $lembaga) {
                            $results = DB::table('dana_lengkap')
                                ->select(DB::raw('sum(nilai) as sum, nama_lembaga, tahun'))
                                ->where('tipe', ucwords($jenis))
                                ->where('golongan', session('filter'))
                                ->where('nama_lembaga', $lembaga->nama)
                                ->where('tahun', $years[$i])
                                ->where('level', 1)
                                ->groupBy('tahun')
                                ->groupBy('nama_lembaga')
                                ->get();
                            if($results != null) {
                                foreach ($results as $result) {
                                    if(!in_array($result->nama_lembaga, $labels)) {
                                        array_push($labels, $result->nama_lembaga);
                                    }
                                    array_push($temp, $result->sum);
                                }
                            }
                        }
                        array_push($datas, $temp);
                    }

                    $tables = [];
                    for($i = 0; $i < count($years); $i++) {
                        $temp = [];
                        $results =  DB::table('dana_lengkap')
                            ->select(DB::raw('dana_id'))
                            ->where('tipe', ucwords($jenis))
                            ->where('tahun', $years[$i])
                            ->where('level', 1)
                            ->where('golongan', session('filter'))
                            ->get();
                        if($results != null) {
                            foreach ($results as $result) {
                                array_push($temp, $result->dana_id);
                            }
                        }
                        array_push($tables, $temp);
                    }

                    $realTables = [];
                    for($i = 0; $i < count($years); $i++) {
                        $temp = [];
                        for($j = 0; $j < count($tables[$i]); $j++) {
                            array_push($temp, $tables[$i][$j]);
                            if(count(Dana::find($tables[$i][$j])->children) > 0) {
                                foreach(Dana::find($tables[$i][$j])->children as $child) {
                                    array_push($temp, $child->id);
                                    if(count($child->children) > 0) {
                                        foreach($child->children as $child1) {
                                            array_push($temp, $child1->id);
                                            if(count($child1->children) > 0) {
                                                foreach($child1->children as $child2) {
                                                    array_push($temp, $child2->id);
                                                    if(count($child2->children) > 0) {
                                                        foreach($child2->children as $child3) {
                                                            array_push($temp, $child3->id);
                                                            if(count($child3->children) > 0) {
                                                                foreach($child3->children as $child4) {
                                                                    array_push($temp, $child4->id);
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                        array_push($realTables, $temp);
                    }
                    $tables = $realTables;
                    // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                    array_unshift($tables, null);
                    $tables = call_user_func_array('array_map', $tables);
                    for($i = 0; $i < count($tables); $i++) {
                        $tmp = [];
                        if(Dana::find($tables[$i][0])->level > 1) {
                            $tmp = ["nama"=>Dana::find($tables[$i][0])->uraian, "level" => (Dana::find($tables[$i][0])->level-1)];
                        } else {
                            $tmp = ["nama"=>Dana::find($tables[$i][0])->lembaga->nama, "level" => (Dana::find($tables[$i][0])->level-1)];
                        }
                        for($j = 0; $j < count($years); $j++) {
                            array_push($tmp, Dana::find($tables[$i][$j])->nilai);
                        }
                        array_push($dataTables, $tmp);
                    }
                }

                $total = [];
                for($i = 0; $i < count($years); $i++) {
                    $total[$i] = 0;
                }
                for($i = 0; $i < count($dataTables); $i++) {
                    if($dataTables[$i]['level'] === 0) {
                        for($j = 0; $j < count($years); $j++) {
                            $total[$j] += $dataTables[$i][$j];
                        }
                    }
                }

                return view('monitor.index')
                    ->withId($id)
                    ->withJenis($jenis)
                    ->withBreadcrumb($breadcrumb)
                    ->withLembagas($lembagas)
                    ->withLabels($labels)
                    ->withDatas($datas)
                    ->withType(session('type'))
                    ->withYears($years)
                    ->withTables($dataTables)
                    ->withTotal($total)
                    ->withColors($colors)
                    ->withAlphas($alphas);
            } else {
    
                /* Tipe Dananya Apa */
                if(session()->has('dana')) {
                    $jenis = session('dana');
                } else {
                    $jenis = "belanja";
                }

                /* MAGIC QUERY */
                $dinas = DB::table('dana_lengkap')
                    ->select(DB::raw('sum(nilai) as sum, tahun'))
                    ->where('tipe', ucwords($jenis))
                    ->where('golongan', "dinas")
                    ->where('level', 1)
                    ->groupBy('tahun')
                    ->get();
                $kecamatan = DB::table('dana_lengkap')
                    ->select(DB::raw('sum(nilai) as sum, tahun'))
                    ->where('tipe', ucwords($jenis))
                    ->where('golongan', "kecamatan")
                    ->where('level', 1)
                    ->groupBy('tahun')
                    ->get();
                $bumd = DB::table('dana_lengkap')
                    ->select(DB::raw('sum(nilai) as sum, tahun'))
                    ->where('tipe', ucwords($jenis))
                    ->where('golongan', "bumd")
                    ->where('level', 1)
                    ->groupBy('tahun')
                    ->get();
                $other = DB::table('dana_lengkap')
                    ->select(DB::raw('sum(nilai) as sum, tahun'))
                    ->where('tipe', ucwords($jenis))
                    ->where('golongan', "lain-lain")
                    ->where('level', 1)
                    ->groupBy('tahun')
                    ->get();
                $datas = [];
                $i = 0;
                foreach ($dinas as $data) {
                    $temp = ['year' => $data->tahun];
                    array_push($temp, $data->sum);
                    array_push($temp, $kecamatan[$i]->sum);
                    array_push($temp, $bumd[$i]->sum);
                    array_push($temp, $other[$i]->sum);
                    array_push($datas, $temp);
                    $i++;
                }
                $labels = ["Dinas", "Kecamatan", "BUMD", "Lain-lain"];

                $years = DB::table('dana_lengkap')
                    ->select(DB::raw('tahun'))
                    ->where('tipe', ucwords($jenis))
                    ->groupBy('tahun')
                    ->get();
                for($i = 0; $i < count($years); $i++) {
                    $years[$i] = $years[$i]->tahun;
                }

                $tables = [];
                $dinasTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    $results =  DB::table('dana_lengkap')
                        ->select(DB::raw('dana_id'))
                        ->where('tipe', ucwords($jenis))
                        ->where('tahun', $years[$i])
                        ->where('level', 1)
                        ->where('golongan', "dinas")
                        ->get();
                    if($results != null) {
                        foreach ($results as $result) {
                            array_push($temp, $result->dana_id);
                        }
                    }
                    array_push($dinasTables, $temp);
                }
                $kecTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    $results =  DB::table('dana_lengkap')
                        ->select(DB::raw('dana_id'))
                        ->where('tipe', ucwords($jenis))
                        ->where('tahun', $years[$i])
                        ->where('level', 1)
                        ->where('golongan', "kecamatan")
                        ->get();
                    if($results != null) {
                        foreach ($results as $result) {
                            array_push($temp, $result->dana_id);
                        }
                    }
                    array_push($kecTables, $temp);
                }
                $bumdTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    $results =  DB::table('dana_lengkap')
                        ->select(DB::raw('dana_id'))
                        ->where('tipe', ucwords($jenis))
                        ->where('tahun', $years[$i])
                        ->where('level', 1)
                        ->where('golongan', "bumd")
                        ->get();
                    if($results != null) {
                        foreach ($results as $result) {
                            array_push($temp, $result->dana_id);
                        }
                    }
                    array_push($bumdTables, $temp);
                }
                $otherTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    $results =  DB::table('dana_lengkap')
                        ->select(DB::raw('dana_id'))
                        ->where('tipe', ucwords($jenis))
                        ->where('tahun', $years[$i])
                        ->where('level', 1)
                        ->where('golongan', "lain-lain")
                        ->get();
                    if($results != null) {
                        foreach ($results as $result) {
                            array_push($temp, $result->dana_id);
                        }
                    }
                    array_push($otherTables, $temp);
                }

                $dataTables = [];
                // CARI PARENT OF PARENT GOLONGAN
                $temp = [];
                for($i = 0; $i < count($years); $i++) {
                    $sum = 0;
                    for($j = 0; $j < count($dinasTables[$i]); $j++) {
                        $sum += Dana::find($dinasTables[$i][$j])->nilai;
                    }
                    array_push($temp, $sum);
                }
                $tmp = ["nama"=>"Dinas", "level" => 0];
                for($i = 0; $i < count($temp); $i++) {
                    array_push($tmp, $temp[$i]);
                }
                array_push($dataTables, $tmp);
                // DAPETIN ANAK"NYA
                $realTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    for($j = 0; $j < count($dinasTables[$i]); $j++) {
                        array_push($temp, $dinasTables[$i][$j]);
                        if(count(Dana::find($dinasTables[$i][$j])->children) > 0) {
                            foreach(Dana::find($dinasTables[$i][$j])->children as $child) {
                                array_push($temp, $child->id);
                                if(count($child->children) > 0) {
                                    foreach($child->children as $child1) {
                                        array_push($temp, $child1->id);
                                        if(count($child1->children) > 0) {
                                            foreach($child1->children as $child2) {
                                                array_push($temp, $child2->id);
                                                if(count($child2->children) > 0) {
                                                    foreach($child2->children as $child3) {
                                                        array_push($temp, $child3->id);
                                                        if(count($child3->children) > 0) {
                                                            foreach($child3->children as $child4) {
                                                                array_push($temp, $child4->id);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    array_push($realTables, $temp);
                }
                $dinasTables = $realTables;
                // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                array_unshift($dinasTables, null);
                $dinasTables = call_user_func_array('array_map', $dinasTables);
                for($i = 0; $i < count($dinasTables); $i++) {
                    $tmp = [];
                    if(Dana::find($dinasTables[$i][0])->level > 1) {
                        $tmp = ["nama"=>Dana::find($dinasTables[$i][0])->uraian, "level" => Dana::find($dinasTables[$i][0])->level];
                    } else {
                        $tmp = ["nama"=>Dana::find($dinasTables[$i][0])->lembaga->nama, "level" => Dana::find($dinasTables[$i][0])->level];
                    }
                    for($j = 0; $j < count($years); $j++) {
                        array_push($tmp, Dana::find($dinasTables[$i][$j])->nilai);
                    }
                    array_push($dataTables, $tmp);
                }
                $temp = [];
                for($i = 0; $i < count($years); $i++) {
                    $sum = 0;
                    for($j = 0; $j < count($kecTables[$i]); $j++) {
                        $sum += Dana::find($kecTables[$i][$j])->nilai;
                    }
                    array_push($temp, $sum);
                }
                $tmp = ["nama"=>"Kecamatan", "level" => 0];
                for($i = 0; $i < count($temp); $i++) {
                    array_push($tmp, $temp[$i]);
                }
                array_push($dataTables, $tmp);
                // DAPETIN ANAK"NYA
                $realTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    for($j = 0; $j < count($kecTables[$i]); $j++) {
                        array_push($temp, $kecTables[$i][$j]);
                        if(count(Dana::find($kecTables[$i][$j])->children) > 0) {
                            foreach(Dana::find($kecTables[$i][$j])->children as $child) {
                                array_push($temp, $child->id);
                                if(count($child->children) > 0) {
                                    foreach($child->children as $child1) {
                                        array_push($temp, $child1->id);
                                        if(count($child1->children) > 0) {
                                            foreach($child1->children as $child2) {
                                                array_push($temp, $child2->id);
                                                if(count($child2->children) > 0) {
                                                    foreach($child2->children as $child3) {
                                                        array_push($temp, $child3->id);
                                                        if(count($child3->children) > 0) {
                                                            foreach($child3->children as $child4) {
                                                                array_push($temp, $child4->id);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    array_push($realTables, $temp);
                }
                $kecTables = $realTables;
                // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                array_unshift($kecTables, null);
                $kecTables = call_user_func_array('array_map', $kecTables);
                for($i = 0; $i < count($kecTables); $i++) {
                    $tmp = [];
                    if(Dana::find($kecTables[$i][0])->level > 1) {
                        $tmp = ["nama"=>Dana::find($kecTables[$i][0])->uraian, "level" => Dana::find($kecTables[$i][0])->level];
                    } else {
                        $tmp = ["nama"=>Dana::find($kecTables[$i][0])->lembaga->nama, "level" => Dana::find($kecTables[$i][0])->level];
                    }
                    for($j = 0; $j < count($years); $j++) {
                        array_push($tmp, Dana::find($kecTables[$i][$j])->nilai);
                    }
                    array_push($dataTables, $tmp);
                }
                $temp = [];
                for($i = 0; $i < count($years); $i++) {
                    $sum = 0;
                    for($j = 0; $j < count($bumdTables[$i]); $j++) {
                        $sum += Dana::find($bumdTables[$i][$j])->nilai;
                    }
                    array_push($temp, $sum);
                }
                $tmp = ["nama"=>"BUMD", "level" => 0];
                for($i = 0; $i < count($temp); $i++) {
                    array_push($tmp, $temp[$i]);
                }
                array_push($dataTables, $tmp);
                // DAPETIN ANAK"NYA
                $realTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    for($j = 0; $j < count($bumdTables[$i]); $j++) {
                        array_push($temp, $bumdTables[$i][$j]);
                        if(count(Dana::find($bumdTables[$i][$j])->children) > 0) {
                            foreach(Dana::find($bumdTables[$i][$j])->children as $child) {
                                array_push($temp, $child->id);
                                if(count($child->children) > 0) {
                                    foreach($child->children as $child1) {
                                        array_push($temp, $child1->id);
                                        if(count($child1->children) > 0) {
                                            foreach($child1->children as $child2) {
                                                array_push($temp, $child2->id);
                                                if(count($child2->children) > 0) {
                                                    foreach($child2->children as $child3) {
                                                        array_push($temp, $child3->id);
                                                        if(count($child3->children) > 0) {
                                                            foreach($child3->children as $child4) {
                                                                array_push($temp, $child4->id);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    array_push($realTables, $temp);
                }
                $bumdTables = $realTables;
                // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                array_unshift($bumdTables, null);
                $bumdTables = call_user_func_array('array_map', $bumdTables);
                for($i = 0; $i < count($bumdTables); $i++) {
                    $tmp = [];
                    if(Dana::find($bumdTables[$i][0])->level > 1) {
                        $tmp = ["nama"=>Dana::find($bumdTables[$i][0])->uraian, "level" => Dana::find($bumdTables[$i][0])->level];
                    } else {
                        $tmp = ["nama"=>Dana::find($bumdTables[$i][0])->lembaga->nama, "level" => Dana::find($bumdTables[$i][0])->level];
                    }
                    for($j = 0; $j < count($years); $j++) {
                        array_push($tmp, Dana::find($bumdTables[$i][$j])->nilai);
                    }
                    array_push($dataTables, $tmp);
                }
                $temp = [];
                for($i = 0; $i < count($years); $i++) {
                    $sum = 0;
                    for($j = 0; $j < count($otherTables[$i]); $j++) {
                        $sum += Dana::find($otherTables[$i][$j])->nilai;
                    }
                    array_push($temp, $sum);
                }
                $tmp = ["nama"=>"Lain-lain", "level" => 0];
                for($i = 0; $i < count($temp); $i++) {
                    array_push($tmp, $temp[$i]);
                }
                array_push($dataTables, $tmp);
                // DAPETIN ANAK"NYA
                $realTables = [];
                for($i = 0; $i < count($years); $i++) {
                    $temp = [];
                    for($j = 0; $j < count($otherTables[$i]); $j++) {
                        array_push($temp, $otherTables[$i][$j]);
                        if(count(Dana::find($otherTables[$i][$j])->children) > 0) {
                            foreach(Dana::find($otherTables[$i][$j])->children as $child) {
                                array_push($temp, $child->id);
                                if(count($child->children) > 0) {
                                    foreach($child->children as $child1) {
                                        array_push($temp, $child1->id);
                                        if(count($child1->children) > 0) {
                                            foreach($child1->children as $child2) {
                                                array_push($temp, $child2->id);
                                                if(count($child2->children) > 0) {
                                                    foreach($child2->children as $child3) {
                                                        array_push($temp, $child3->id);
                                                        if(count($child3->children) > 0) {
                                                            foreach($child3->children as $child4) {
                                                                array_push($temp, $child4->id);
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                    array_push($realTables, $temp);
                }
                $otherTables = $realTables;
                // MAGICALLY SHIFT THE ARRAY!!! WHOOOOOO PUKE RAINBOW!!!!!!
                array_unshift($otherTables, null);
                $otherTables = call_user_func_array('array_map', $otherTables);
                for($i = 0; $i < count($otherTables); $i++) {
                    $tmp = [];
                    if(Dana::find($otherTables[$i][0])->level > 1) {
                        $tmp = ["nama"=>Dana::find($otherTables[$i][0])->uraian, "level" => Dana::find($otherTables[$i][0])->level];
                    } else {
                        $tmp = ["nama"=>Dana::find($otherTables[$i][0])->lembaga->nama, "level" => Dana::find($otherTables[$i][0])->level];
                    }
                    for($j = 0; $j < count($years); $j++) {
                        array_push($tmp, Dana::find($otherTables[$i][$j])->nilai);
                    }
                    array_push($dataTables, $tmp);
                }
                $total = [];
                for($i = 0; $i < count($years); $i++) {
                    $total[$i] = 0;
                }
                for($i = 0; $i < count($dataTables); $i++) {
                    if($dataTables[$i]['level'] === 0) {
                        for($j = 0; $j < count($years); $j++) {
                            $total[$j] += $dataTables[$i][$j];
                        }
                    }
                }

                return view('monitor.index')
                    ->withJenis($jenis)
                    ->withBreadcrumb(ucwords($jenis)." | Semua")
                    ->withType(session('type'))
                    ->withDatas($datas)
                    ->withLabels($labels)
                    ->withTables($dataTables)
                    ->withYears($years)
                    ->withTotal($total)
                    ->withColors($colors)
                    ->withAlphas($alphas);
        }
        }
    }

    public function store(Request $request) {
        $dana = new Dana;
        $dana->kode = $request->kode;
        $dana->uraian = $request->uraian;
        if($request->nilai != null) {
            $dana->nilai = $request->nilai;
        }
        if($request->tahun != null) {
            $dana->tahun = $request->tahun;
        }
        if($request->level != null) {
            $dana->level = $request->level;
        }
        $dana->lembaga_id = $request->lembaga_id;
        $dana->save();
        foreach($request->tags as $tag) {
            $dana->tags()->attach($tag);
        }
        return redirect()->route('data.input');
    }

    public function top($tipe) {
        
    }
}
