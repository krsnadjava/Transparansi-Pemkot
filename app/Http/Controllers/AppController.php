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

            $jenis = session('dana');
            $breadcrumb = ucwords($jenis)." | ".ucwords(session('filter'));
            if(session()->has('id')) {
                $id = (int)session('id');
                $breadcrumb = $breadcrumb." > ".ucwords(Lembaga::findOrFail($id)->nama);
            } else {
                $lembagas = Lembaga::where('golongan', session('filter'))->get();
                $danas = [];
                foreach($lembagas as $lembaga) {
                    foreach ($lembaga->danas as $dana) {
                        array_push($danas, $dana);
                    }
                }
            }

            return view('monitor.index')->withBreadcrumb($breadcrumb)->withLembagas($lembagas)->withDanas($danas)->withType(session('type'))->withColors($colors)->withAlphas($alphas);
        } else {
            if(session()->has('filter')) {
                $jenis = session('dana');
            } else {
                $jenis = "belanja";
            }
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
            return view('monitor.index')->withBreadcrumb(ucwords($jenis)." | Semua")->withType(session('type'))->withDatas($datas)->withLabels($labels)->withColors($colors)->withAlphas($alphas);
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
