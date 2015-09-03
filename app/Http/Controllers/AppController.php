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
        
        if(session()->has('filter')) {
            /*
            if(session('filter') === "dinas") {
                return view('monitor.index')->withBreadcrumb($breadcrumb)->withLembagas($lembagas)->withDanas($danas)->withType(session('type'));
            } elseif(session('filter') === "kecamatan") {
                return view('monitor.index')->withBreadcrumb("Belanja | Kecamatan")->withType(session('type'));
            } elseif(session('filter') === "bumd") {
                return view('monitor.index')->withBreadcrumb("Belanja | Badan Usaha Milik Daerah")->withType(session('type'));
            } else {
                return view('monitor.index')->withBreadcrumb("Belanja | Lain-lain")->withType(session('type'));
            }
            */

            /* Tipe Dananya Apa */
            if(session()->has('dana')) {
                $jenis = session('dana');
            } else {
                $jenis = "belanja";
            }

            $breadcrumb = ucwords($jenis)." | ".ucwords(session('filter'));
            
            if(session()->has('id')) {
                $id = (int)session('id');
                $breadcrumb = $breadcrumb." > ".ucwords(Lembaga::find($id)->nama);
                $lembagas = null;
                $datas = null;

            } else {
                $lembagas = Lembaga::where('golongan', session('filter'))->get();
                $datas = [];
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
                            ->where('level', 5)
                            ->groupBy('tahun')
                            ->groupBy('nama_lembaga')
                            ->get();
                        if($results != null) {
                            foreach ($results as $result) {
                                array_push($temp, $result->sum);
                            }
                        }
                    }
                    array_push($datas, $temp);
                }

                dd($datas);
            }

            return view('monitor.index')
                ->withJenis($jenis)
                ->withBreadcrumb($breadcrumb)
                ->withLembagas($lembagas)
                ->withDatas($datas)
                ->withType(session('type'))
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
                ->groupBy('tahun')
                ->get();
            $kecamatan = DB::table('dana_lengkap')
                ->select(DB::raw('sum(nilai) as sum, tahun'))
                ->where('tipe', ucwords($jenis))
                ->where('golongan', "kecamatan")
                ->groupBy('tahun')
                ->get();
            $bumd = DB::table('dana_lengkap')
                ->select(DB::raw('sum(nilai) as sum, tahun'))
                ->where('tipe', ucwords($jenis))
                ->where('golongan', "bumd")
                ->groupBy('tahun')
                ->get();
            $other = DB::table('dana_lengkap')
                ->select(DB::raw('sum(nilai) as sum, tahun'))
                ->where('tipe', ucwords($jenis))
                ->where('golongan', "lain-lain")
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
            
            return view('monitor.index')
                ->withJenis($jenis)
                ->withBreadcrumb(ucwords($jenis)." | Semua")
                ->withType(session('type'))
                ->withDatas($datas)
                ->withLabels($labels)
                ->withColors($colors)
                ->withAlphas($alphas);
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
}
