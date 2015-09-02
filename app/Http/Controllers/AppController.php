<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppController extends Controller
{
    public function index()
    {
        if(session()->has('filter')) {
            if(session('filter') === "dinas") {
                $datas = array(
                    ["x" => [3064, 1722, 3485], "y" => "2014-12-05"],
                    ["x" => [2783, 1283, 5403], "y" => "2015-02-20"]
                );
                return view('monitor.index')->withBreadcrumb("Belanja | Dinas")->withDatas("test")->withType(session('type'));
            } elseif(session('filter') === "kecamatan") {
                return view('monitor.index')->withBreadcrumb("Belanja | Kecamatan")->withType(session('type'));
            } elseif(session('filter') === "bumd") {
                return view('monitor.index')->withBreadcrumb("Belanja | Badan Usaha Milik Daerah")->withType(session('type'));
            } else {
                return view('monitor.index')->withBreadcrumb("Belanja | Lain-lain")->withType(session('type'));
            }
        } else {
            return view('monitor.index')->withBreadcrumb("Belanja | Semua")->withType(session('type'));
        }
    }
}
