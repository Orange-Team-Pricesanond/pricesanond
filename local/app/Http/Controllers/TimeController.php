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
    
        $last_total = 0;
        $estimate = $yellow->yf_estimate; // งบประมาณ
        foreach($sheet as $_val)
        {
            $arrays = explode(':', $_val->ts_total_time); 
            $total = intval($arrays[0]).".".$arrays[1];

            if($_val->ts_reate_work == 'A')
            {
                $total += $total;
                $rate = $yellow->yf_rates_a;
            }
            elseif($_val->ts_reate_work == 'B')
            {   
                $total += $total;
                $rate = $yellow->yf_rates_b;
            }
            elseif($_val->ts_reate_work == "C")
            {
                $total += $total;
                $rate = $yellow->yf_rates_c;
            }
            elseif($_val->ts_reate_work == "D")
            {
                $total += $total;
                $rate = $yellow->yf_rates_d;
            }
            elseif($_val->ts_reate_work == "E")
            {   
                $total += $total;
                $rate = $yellow->yf_rates_e;
            }else{ // F
                $total += $total;
                $rate = $yellow->yf_rates_f;
            }
            $last_total += number_format(($total/60)*$rate ,2);
        }
        $anwer = ($last_total>$estimate) ? "1" : "0";

        if(!empty($sheet))
        {
            // return view('daily_time_sheet.time-sheet-create', [
            return view('daily_time_sheet.list-time-sheet', [    
                'anwer' => $anwer ,
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'date' => $date ,
                'count' => $count ,
                'id' => $id ,
            ]);

        }else{
            return view('daily_time_sheet.list-time-sheet', [
                'anwer' => '0' ,
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
            if($select != null)
            {
                $oldno = intval(substr($select->ts_no,8))+1;
                //run number
                $sprin = sprintf('%06d', $oldno); 
                $no = 'Q-'.$date.'-'.$sprin;

            }else{
                $no = 'Q-'.$date.'-000001';
            }
            

            $Lastid = DB::table('tb_timesheet')->insertGetId(
                [
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
                ]
            );
            $data = [
                'ts_id' => $Lastid,
                'id_member' =>$request->input('id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('tb_logtimesheet')->insert($data);
        }

        // for($i=0 ; $i < count($request->input('ts_law_id')) ; $i++){ 
        //     $timesheet = [
        //         'ts_id_yf' => $request->input('ts_id_yf') ,
        //         'ts_no' => $no,
        //         'ts_law_id' => $request->input('ts_law_id')[$i],
        //         'ts_reate_work' => $request->input('ts_reate_work')[$i],
        //         'ts_form' => $request->input('ts_form')[$i],
        //         'ts_to' => $request->input('ts_to')[$i],
        //         'ts_total_time' => $request->input('ts_total_time')[$i],
        //         'ts_woek' => $request->input('ts_woek')[$i],
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s'),
        //     ];
        //     // dd($timesheet);
        //     DB::table('tb_timesheet')->insert($timesheet); 
        // }    
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
