<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Http\Request;
use App\Models\ListPortofolio;
use App\Models\RegionModel;

class InformasiPublikController extends Controller
{
    public function dataBmkgCuaca(Request $req){
        $banner = BannerModel::where('id', '1')->first();
        $porto = ListPortofolio::all();
        $kodeWilayah = $req->input('region');

        $endpoint   = env('API_BMKG');
        $service    = '/prakiraan-cuaca?';
        $param      = [
            'adm4' => $kodeWilayah,
        ];
        $queryParam = http_build_query($param);
        $request    = $endpoint.$service.$queryParam;
        // dd($request);
        $dataBmkg   = json_decode(sendData($request), true);
        // dd($dataBmkg);
        $dataRegion = RegionModel::all();
        return view('master.informasi_publik.informasi_publik', compact(
            'porto',
            'banner',
            'dataRegion',
            'dataBmkg',
        ));
    }
}