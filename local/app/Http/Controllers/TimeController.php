<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\timerecordModel;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
use App\LawModel;
use DB;
use Image;

class TimeController extends Controller
{
    public function index()
    {
        $client = tb_client::all();
        $yellowfile = yellowfileModel::all();
        $address = addressModel::all();
        $sheet = timerecordModel::all();
        $join = DB::table('tb_clients')
        ->join('tb_yellowfiles', 'tb_clients.id_ct', '=', 'tb_yellowfiles.id_ct_yf')
        ->get();
        return view('daily_time_sheet.index', [
            'client' => $client ,
            'yellowfile' => $yellowfile ,
            'address' => $address ,
            'join' => $join ,
            'sheet' => $sheet ,
        ]);
    }
    public function viewsheet($id)
    {   
        $date = date("d/m/Y");
        $yellow = DB::table('tb_yellowfiles')->where('id_yf',$id)->first();
        $sheet = DB::table('tb_timesheet')->where('ts_id_yf',$id)->get();
        $count = DB::table('tb_timesheet')->where('ts_id_yf',$id)->count();
        if(!empty($sheet))
        {
            // return view('daily_time_sheet.time-sheet-create', [
            return view('daily_time_sheet.list-time-sheet', [
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'date' => $date ,
                'count' => $count ,
                'id' => $id ,
            ]);

        }else{
            return view('daily_time_sheet.list-time-sheet', [
                'id' => $id ,
            ]);
        }
    }
    public function viewsheetadd($id)
    {   
        $date = date("d/m/Y");
        $yellow = DB::table('tb_yellowfiles')->where('id_yf',$id)->first();
        $sheet = DB::table('tb_timesheet')->where('ts_id_yf',$id)->get();
        $count = DB::table('tb_timesheet')->where('ts_id_yf',$id)->count();
        if(!empty($sheet))
        {
            return view('daily_time_sheet.time-sheet-create', [
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'date' => $date ,
                'count' => $count ,
                'id' => $id ,
            ]);

        }else{
            return view('daily_time_sheet.time-sheet-create', [
                'id' => $id ,
                'date' => $date ,
            ]);
        }
    }
    public function delete($id)
    {
        DB::table('tb_timesheet')->where('ts_id',$id)->delete();
        
        $client = tb_client::all();
        $yellowfile = yellowfileModel::all();
        $address = addressModel::all();
        $sheet = timerecordModel::all();
        $join = DB::table('tb_clients')
        ->join('tb_yellowfiles', 'tb_clients.id_ct', '=', 'tb_yellowfiles.id_ct_yf')
        ->get();
       
        return view('daily_time_sheet.index', [
            'client' => $client ,
            'yellowfile' => $yellowfile ,
            'address' => $address ,
            'join' => $join ,
            'sheet' => $sheet ,
        ]);
    }
    public function insert(Request $request)
    {
        $date = date('ym');  
        for($i=0 ; $i < count($request->input('ts_law_id')) ; $i++){ 
           
            $select = timerecordModel::orderBy('ts_no', 'DESC')->take(1)->first();
            $oldno = intval(substr($select->ts_no,8))+1;
            //run number
            $sprin = sprintf('%06d', $oldno); 
            $no = 'Q-'.$date.'-'.$sprin;
            $timesheet = [
                'ts_id_yf' => $request->input('ts_id_yf') ,
                'ts_no' => $no,
                'ts_law_id' => $request->input('ts_law_id')[$i],
                'ts_reate_work' => $request->input('ts_reate_work')[$i],
                'ts_form' => $request->input('ts_form')[$i],
                'ts_to' => $request->input('ts_to')[$i],
                'ts_total_time' => $request->input('ts_total_time')[$i],
                'ts_woek' => $request->input('ts_woek')[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            // dd($timesheet);
            DB::table('tb_timesheet')->insert($timesheet); 
        }    
        return redirect('dailytime');
    }
    public function deleteAjax(Request $request)
    {
        DB::table('tb_timesheet')->where('ts_id',$request->id)->delete();
        echo 'complete';
    }
    public function selectLawAjax(Request $request)
    {
        $law = DB::table('tb_law')->where('law_id',$request->idlaw)->first();
        $yellowfile = DB::table('tb_yellowfiles')->where('id_yf',$request->yellow)->first();
        
        echo $law->lw_yf_rates;
    }
}
