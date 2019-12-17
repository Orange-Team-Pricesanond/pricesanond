<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\timerecordModel;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
use DB;
use Image;

class TimeController extends Controller
{
    public function index()
    {
        $client = tb_client::all();
        $address = addressModel::all();
        $sheet = timerecordModel::all();
        $join = DB::table('tb_clients')
        ->join('tb_yellowfiles', 'tb_clients.id_ct', '=', 'tb_yellowfiles.id_ct_yf')
        ->get();
        return view('daily_time_sheet.index', [
            'client' => $client ,
            'address' => $address ,
            'join' => $join ,
            'sheet' => $sheet ,
        ]);
    }
}
