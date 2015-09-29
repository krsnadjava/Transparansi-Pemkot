<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;

use App\Dana;
use App\Lembaga;
use App\Tag;

class DataController extends Controller
{
    public function index() {
    	
    	/* Helper Variable */
    	$colors = ["#17A768", "#F1601D", "#F1AD1D", "#BBAE93", "#15B768", "#F5701D", "#E1AD2D", "#B5A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3", "#25B764", "#95A01D", "#B17CBD", "#A0A2A3"];
        $alphas = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z", "aa", "ab", "ac", "ad", "ae", "af", "ag", "ah", "ai", "aj", "ak"];
        $helper = ['colors' => $colors, 'alphas' => $alphas];

        /* Global Variable */
        $breadcrumbs = null;						// breadcrumbs
        $jenis = null; 								// tipe dana(belanja, pendapatan)
        if(session()->has('dana')) {
            $jenis = session('dana');				// get it from session
        } else {
        	$jenis = 'belanja';						// default value of tipe dana
        }
        $years = DB::table('dana_lengkap')			// list of tahun(Object)
            ->select(DB::raw('tahun'))
            ->where('tipe', ucwords($jenis))
            ->groupBy('tahun')
            ->orderBy('tahun', 'desc')
            ->take(5) // 5 last year
            ->get();
        /* We have to invert the array */
        $invert = $years;
        $idInvert = count($years)-1;
        for($i = 0; $i < count($years); $i++) {
        	$years[$i] = $invert[$idInvert];
        	$idInvert--;
        }
        for($i = 0; $i < count($years); $i++) {		// list of tahun(Object) -> list of tahun (int)
            $years[$i] = $years[$i]->tahun;
        }
        $dataTables = null;
        $dataGraphs = null;
        $tooltip =  null;

        /* Data Query */
        if(session()->has('top')) { // TOP 10

        	$breadcrumbs = "Top 10 | ".ucwords($jenis);

        	$datas = [];

        	if(session()->has('tag')) {
        		$tag = session('tag');
        		if($tag === "ratio") {

        		} else { // "tag" by default

        		}
        	} else {
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
        	}

        	/* Passing data to view */
        	dd($breadcrumbs);
        	return view('visualize.top')
        		->withHelper($helper)
        		->withType(session('type'))
        		->withBreadcrumbs($breadcrumbs)
        		->withTables($datas)
        		->withYears($years);
        } else { // per Year Progress

        	if(session()->has('filter')) { // Spesifik Lembaga

        		$breadcrumbs = ucwords($jenis)." | ".ucwords(session('filter'));
        		$id = null;
        		$levelMargin = 1;

        		if(session()->has('id')) {
        			$levelMargin = 2;
        			$id = (int)session('id');
                    $breadcrumbs .= " > ".ucwords(Lembaga::find($id)->nama);
        		}

        		$roots = [];
                
                for($i = 0; $i < count($years); $i++) {
                	$ids = [];
                	$results = null;

                	if($id != null) {
                		$results =  DB::table('dana_lengkap')
                        	->select(DB::raw('dana_id'))
                        	->where('tipe', ucwords($jenis))
                        	->where('tahun', $years[$i])
                        	->where('nama_lembaga', Lembaga::find($id)->nama)
                        	->where('level', 2)
                        	->where('golongan', session('filter'))
                        	->get();
                	} else {
                		$results =  DB::table('dana_lengkap')
                        	->select(DB::raw('dana_id'))
                        	->where('tipe', ucwords($jenis))
                        	->where('tahun', $years[$i])
                        	->where('level', 1)
                        	->where('golongan', session('filter'))
                        	->get();
                	}

                    if($results != null) {
                    	foreach ($results as $result) {
                    	    array_push($ids, $result->dana_id);
                    	}
                    }

                    array_push($roots, $ids);
                }

                /* SAFETY FUNCTION IF DATA NOT EXIST */
                if(count($roots) < 1 || count($roots[0]) < 1) {
                	return redirect()->route('transparansi')->withError('data');
                }

                /* Populate Data for Table */
				/* What we need?
				*	uraian dana
				*	level
				*	values per year
				*/
				$idsPerYear = [];
				for($i = 0; $i < count($years); $i++) {
					$ids = [];

					for($j = 0; $j < count($roots[$i]); $j++) {
						array_push($ids, $roots[$i][$j]);
						if(count(Dana::find($roots[$i][$j])->children) > 0) {
							foreach(Dana::find($roots[$i][$j])->children as $child) {
								array_push($ids, $child->id);
								if(count(Dana::find($child->id)->children) > 0) {
									foreach (Dana::find($child->id)->children as $child1) {
										array_push($ids, $child1->id);
										if(count(Dana::find($child1->id)->children) > 0) {
											foreach (Dana::find($child1->id)->children as $child2) {
												array_push($ids, $child2->id);
												if(count(Dana::find($child2->id)->children) > 0) {
													foreach (Dana::find($child2->id)->children as $child3) {
														array_push($ids, $child3->id);
														if(count(Dana::find($child3->id)->children) > 0) {
															foreach (Dana::find($child3->id)->children as $child4) {
																array_push($ids, $child4->id);
																if(count(Dana::find($child4->id)->children) > 0) {
																	foreach (Dana::find($child4->id)->children as $child5) {
																		array_push($ids, $child5->id);
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
						}
					}

					array_push($idsPerYear, $ids);
				}

                $dataTables = [];
                for ($i=0; $i < count($idsPerYear[0]); $i++) { 
                	$temp = null;

                	if(Dana::find($idsPerYear[0][$i])->level > 1) {
						$temp = ['id'=>[], 'nama'=>Dana::find($idsPerYear[0][$i])->uraian, 'level'=>(Dana::find($idsPerYear[0][$i])->level-$levelMargin)];
					} else {
						$temp = ['id'=>[],'nama'=>Dana::find($idsPerYear[0][$i])->lembaga->nama, 'level'=>(Dana::find($idsPerYear[0][$i])->level-$levelMargin)];
					}

					for($j = 0; $j < count($years); $j++) {
						array_push($temp['id'], $idsPerYear[$j][$i]);
						array_push($temp, Dana::find($idsPerYear[$j][$i])->nilai);
					}

					array_push($dataTables, $temp);
                }

                /* Populate Data for Chart */
				/* What we need?
				*	sum values per year (y-axis)
				*	label (tooltip)
				*	years (x-axis) <- Already done!
				*/
				$dataGraphs = [];
				$tooltips = [];
				for($i = 0; $i < count($dataTables); $i++) {
					if($dataTables[$i]['level'] == 0) {
						$temp = ['nama' => $dataTables[$i]['nama']];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp, $dataTables[$i][$j]);
						}
						array_push($dataGraphs, $temp);

						$tooltipDetail = ['nama' => $dataTables[$i]['nama'], 'id' => Dana::find($dataTables[$i]['id'][0])->lembaga->id, 'url' => strtolower(Dana::find($dataTables[$i]['id'][0])->lembaga->golongan)];
						array_push($tooltips, $tooltipDetail);
					}
				}

			} elseif(session()->has('exclude')) {

				$breadcrumbs = ucwords($jenis)." | Filtered";

				$exclude = [];
				$exclude = session('exclude');
				for($i = 0; $i < count($exclude); $i++) {
					if(strpos($exclude[$i],"inas") || strpos($exclude[$i],'matan') || strpos($exclude[$i],'MD') || strpos($exclude[$i],'lain')) {
						$exclude[$i] = strtolower($exclude[$i]);
					} else {
						$idArray = explode(',',$exclude[$i]);
						$temp = [];
						for($j = 0; $j < count($idArray); $j++) {
							array_push($temp, (int) $idArray[$j]);
						}
						$exclude[$i] = $temp;
					}
				}
				
				/* Setting up level margin */
				$levelMargin = 0;
				if($exclude[0] === "dinas" || $exclude[0] === "kecamatan" || $exclude[0] === "bumd" || $exclude[0] === "lain-lain") {
					$levelMargin = 0;
				} else {
					$levelMargin = Dana::find($exclude[0][0])->level;
				}

				/* Populate Data for Table */
				/* What we need?
				*	uraian dana
				*	level
				*	values per year
				*/
				$dataTables = [];
				$parentId = 0;
				for($i = 0; $i < count($exclude); $i++) {
					$temp = null;
					if($exclude[$i] === "dinas") {
						$temp = ['id' =>[], 'nama'=> "Dinas", 'level'=>0];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp['id'], -999);
							array_push($temp, 0);
						}
						$parentId = $i;
					} else if ($exclude[$i] === "kecamatan") {
						$temp = ['id' =>[], 'nama'=> "Kecamatan", 'level'=>0];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp['id'], -999);
							array_push($temp, 0);
						}
						$parentId = $i;
					} else if ($exclude[$i] === "bumd") {
						$temp = ['id' =>[], 'nama'=> "BUMD", 'level'=>0];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp['id'], -999);
							array_push($temp, 0);
						}
						$parentId = $i;
					} else if ($exclude[$i] === "lain-lain") {
						$temp = ['id' =>[], 'nama'=> "Lain-lain", 'level'=>0];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp['id'], -999);
							array_push($temp, 0);
						}
						$parentId = $i;
					} else {
						if($levelMargin === 0) {
							if(Dana::find($exclude[$i][0])->level > 1) {
								$temp = ['id'=>[], 'nama'=>Dana::find($exclude[$i][0])->uraian, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							} else {
								$temp = ['id'=>[],'nama'=>Dana::find($exclude[$i][0])->lembaga->nama, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							}

							for($j = 0; $j < count($years); $j++) {
								array_push($temp['id'], $exclude[$i][$j]);
								array_push($temp, Dana::find($exclude[$i][$j])->nilai);
							
								if(Dana::find($exclude[$i][0])->level-$levelMargin === 1)
									$dataTables[$parentId][$j] += Dana::find($exclude[$i][$j])->nilai;
							}
						} else if($levelMargin === 1) {
							if(Dana::find($exclude[$i][0])->level-$levelMargin > 0) {
								$temp = ['id'=>[], 'nama'=>Dana::find($exclude[$i][0])->uraian, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							} else {
								$temp = ['id'=>[],'nama'=>Dana::find($exclude[$i][0])->lembaga->nama, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							}

							if(count($exclude[$i]) > 1) {
								for($j = 0; $j < count($years); $j++) {
									array_push($temp['id'], $exclude[$i][$j]);
									array_push($temp, Dana::find($exclude[$i][$j])->nilai);
								}
							} else {
								for($j = 0; $j < count($years); $j++) {
									$results =  DB::table('dana_lengkap')
                        				->select(DB::raw('dana_id'))
                        				->where('tipe', ucwords($jenis))
                        				->where('tahun', $years[$j])
                        				->where('level', $levelMargin)
                        				->where('nama_lembaga', Lembaga::find($exclude[$i][0])->nama)
                        				->get();

                        			if($j < 1)
                        				array_push($temp['id'], -999);
                        			else
                        				array_push($temp['id'], $results[0]->dana_id);
                        			array_push($temp, Dana::find($results[0]->dana_id)->nilai);	
								}
							}
						} else {
							if(Dana::find($exclude[$i][0])->level > 1) {
								$temp = ['id'=>[], 'nama'=>Dana::find($exclude[$i][0])->uraian, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							} else {
								$temp = ['id'=>[],'nama'=>Dana::find($exclude[$i][0])->lembaga->nama, 'level'=>(Dana::find($exclude[$i][0])->level-$levelMargin)];
							}

							for($j = 0; $j < count($years); $j++) {
								array_push($temp['id'], $exclude[$i][$j]);
								array_push($temp, Dana::find($exclude[$i][$j])->nilai);
							}
						}
					}
					array_push($dataTables, $temp);
				}

				/* Populate Data for Chart */
				/* What we need?
				*	sum values per year (y-axis)
				*	label (tooltip)
				*	years (x-axis) <- Already done!
				*/
				$dataGraphs = [];
				$tooltips = [];
				for($i = 0; $i < count($dataTables); $i++) {
					if($dataTables[$i]['id'][0] < 0) {
						$temp = ['nama' => $dataTables[$i]['nama']];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp, $dataTables[$i][$j]);
						}
						array_push($dataGraphs, $temp);

						$tooltipDetail = ['nama' => $dataTables[$i]['nama'], 'id' => 0, 'url' => ""];
						if($levelMargin > 0) {
							$tooltipDetail['id'] = Dana::find($dataTables[$i]['id'][1])->lembaga->id;
							$tooltipDetail['url'] .= Dana::find($dataTables[$i]['id'][1])->lembaga->golongan;
						} else {
							$tooltipDetail['id'] = -999;
							$tooltipDetail['url'] .= strtolower($dataTables[$i]['nama']);
						}
						array_push($tooltips, $tooltipDetail);
					}
				}

			} else { // General

        		$breadcrumbs = ucwords($jenis)." | Semua";

				$lembagas = ['dinas', 'kecamatan', 'bumd', 'lain-lain']; 	// List of lembaga, karena ini general

				/* Get Root Node */
				$roots = []; // list of root ids per lembaga per year

				for($i = 0; $i < count($years); $i ++) {
					$ids = []; // list of root ids per lembaga
					for($j = 0; $j < count($lembagas); $j++) {
						$temp = [];
						$results =  DB::table('dana_lengkap')
                       		->select(DB::raw('dana_id'))
                       		->where('tipe', ucwords($jenis))
                       		->where('tahun', $years[$i])
                       		->where('level', 1)
                       		->where('golongan', $lembagas[$j])
                       		->get();
                       	if($results != null) {
                       		foreach ($results as $result) {
                   		        array_push($temp, $result->dana_id);
                   		    }
                   		}
                       	array_push($ids, $temp);
					}
					array_push($roots, $ids);
				}

				/* SAFETY FUNCTION IF DATA NOT EXIST */
                if(count($roots) < 1 || count($roots[0]) < 1) {
                	return redirect()->route('transparansi')->withError('data');
                }

				/* Populate Data for Table */
				/* What we need?
				*	uraian dana
				*	level
				*	values per year
				*/
				$idsPerYear = [];
				for($i = 0; $i < count($years); $i++) {
					$ids = [];

					for($j = 0; $j < count($roots[$i]); $j++) {
						array_push($ids, -999);		// penanda ganti lembaga

						for($k = 0; $k < count($roots[$i][$j]); $k++) {
							array_push($ids, $roots[$i][$j][$k]);
							if(count(Dana::find($roots[$i][$j][$k])->children) > 0) {
								foreach(Dana::find($roots[$i][$j][$k])->children as $child) {
									array_push($ids, $child->id);
									if(count(Dana::find($child->id)->children) > 0) {
										foreach (Dana::find($child->id)->children as $child1) {
											array_push($ids, $child1->id);
											if(count(Dana::find($child1->id)->children) > 0) {
												foreach (Dana::find($child1->id)->children as $child2) {
													array_push($ids, $child2->id);
													if(count(Dana::find($child2->id)->children) > 0) {
														foreach (Dana::find($child2->id)->children as $child3) {
															array_push($ids, $child3->id);
															if(count(Dana::find($child3->id)->children) > 0) {
																foreach (Dana::find($child3->id)->children as $child4) {
																	array_push($ids, $child4->id);
																	if(count(Dana::find($child4->id)->children) > 0) {
																		foreach (Dana::find($child4->id)->children as $child5) {
																			array_push($ids, $child5->id);
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
							}
						}
					}

					array_push($idsPerYear, $ids);
				}

				$dataTables = [];
				$idLembaga = 0;
				for($i = 0; $i < count($idsPerYear[0]); $i++) {
					$temp = null;
					if($idsPerYear[0][$i] < 0) {
						if($lembagas[$idLembaga] === "bumd") {
							$temp = ['id' =>[], 'nama'=> "BUMD", 'level'=>0];
							for($j = 0; $j < count($years); $j++) {
								array_push($temp['id'], -999);
							}
						} else {
							$temp = ['id' =>[], 'nama'=>ucwords($lembagas[$idLembaga]), 'level'=>0];
							for($j = 0; $j < count($years); $j++) {
								array_push($temp['id'], -999);
							}	
						}
						for($j = 0; $j < count($years); $j++) {
							$sumValues = 0;
							for($k = 0; $k < count($roots[$j][$idLembaga]); $k++) {
								$sumValues += Dana::find($roots[$j][$idLembaga][$k])->nilai; //!!JANGAN PEKE ROOTS BIAR BISA FILTER NANTI
							}
							array_push($temp, $sumValues);
						}
						$idLembaga++;
					} else {
						if(Dana::find($idsPerYear[0][$i])->level > 1) {
							$temp = ['id'=>[], 'nama'=>Dana::find($idsPerYear[0][$i])->uraian, 'level'=>Dana::find($idsPerYear[0][$i])->level];
						} else {
							$temp = ['id'=>[],'nama'=>Dana::find($idsPerYear[0][$i])->lembaga->nama, 'level'=>Dana::find($idsPerYear[0][$i])->level];
						}
						for($j = 0; $j < count($years); $j++) {
							array_push($temp['id'], $idsPerYear[$j][$i]);
							array_push($temp, Dana::find($idsPerYear[$j][$i])->nilai);
						}
					}

					array_push($dataTables, $temp);
				}

				/* Populate Data for Chart */
				/* What we need?
				*	sum values per year (y-axis)
				*	label (tooltip)
				*	years (x-axis) <- Already done!
				*/
				$dataGraphs = [];
				$tooltips = [];
				for($i = 0; $i < count($dataTables); $i++) {
					if($dataTables[$i]['id'][0] < 0) {
						$temp = ['nama' => $dataTables[$i]['nama']];
						for($j = 0; $j < count($years); $j++) {
							array_push($temp, $dataTables[$i][$j]);
						}
						array_push($dataGraphs, $temp);

						$tooltipDetail = ['nama' => $dataTables[$i]['nama'], 'id' => -999, 'url' => strtolower($dataTables[$i]['nama'])];
						array_push($tooltips, $tooltipDetail);
					}
				}
        	}

        	/* Passing data to view */
        	if(session()->has('error')) {
        		$message = "";

        		if(session('error') === "request") {
        			$message = "Bad request detected!";
        		} else {
        			$message = "Oops, the data you want not found...";
        		}

        		return view('visualize.index')
        			->withError($message)
        			->withHelper($helper)
        			->withType(session('type'))
        			->withBreadcrumbs($breadcrumbs)
        			->withJenis($jenis)
        			->withTables($dataTables)
        			->withYears($years)
        			->withGraphs($dataGraphs)
        			->withTooltips($tooltips);
        	} else {
        		return view('visualize.index')
        			->withHelper($helper)
        			->withType(session('type'))
        			->withBreadcrumbs($breadcrumbs)
        			->withJenis($jenis)
        			->withTables($dataTables)
        			->withYears($years)
        			->withGraphs($dataGraphs)
        			->withTooltips($tooltips);
        	}
        }
    }

    public function exclude(Request $request) {
		if($request->input('_METHOD') != "POST") {
			return redirect()->route('transparansi')->withError("request");
		} else {
			return redirect()->route('transparansi')->withExclude($request->exclude)->withDana($request->dana);
		}
	}
}