<?php

namespace App\Http\Controllers;

use App\Models\MasterKotaKabupaten;
use App\Models\MasterProvinsi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MasterKotaKabupatenController extends Controller
{
    public function __construct()
    {
        $this->kabupaten = new MasterKotaKabupaten();
    }
    public function getKabupaten(Request $request)
    {
        $id = $request->id;
        $dataKabupaten = MasterProvinsi::where('id',$id)->get()->first();
        $region_id = $dataKabupaten->region_id;
        $subs = Str::substr($region_id, 0, 2);
        $kabupaten = $this->kabupaten->searchKabupaten($subs);
        foreach($kabupaten as $kab){
            echo "<option value='$kab->id'>$kab->nama</option>";
        }
    }
    
}
