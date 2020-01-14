<?php

namespace App\Http\Controllers;

use app\Http\Middleware\VerifyCsrfToken;

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
        $rate = 0;
        $total = 0;
        $select_total = array();
        $estimate = $yellow->yf_estimate; // งบประมาณ
        foreach($sheet as $_val)
        {
            $arrays = explode(':', $_val->ts_total_time); 
            $total_all = (intval($arrays[0])*60)+$arrays[1];
            
            if($_val->ts_reate_work == 'A')
            {
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_a;
            }
            elseif($_val->ts_reate_work == 'B')
            {   
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_b;
            }
            elseif($_val->ts_reate_work == "C")
            {
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_c;
            }
            elseif($_val->ts_reate_work == "D")
            {
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_d;
            }
            elseif($_val->ts_reate_work == "E")
            {   
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_e;
            }else{ // F
                $total += $total_all;
                $total_single = $total_all;
                $rate = $yellow->yf_rates_f;
            }
            $last_total += number_format(($total_single/60)*$rate ,2);

            $select_total[$_val->ts_id] = number_format(($total_single/60)*$rate ,2);

        }
        $anwer = ($last_total>$estimate) ? "1" : "0";

        if(!empty($sheet))
        {
            return view('daily_time_sheet.list-time-sheet', [    
                'anwer' => $anwer ,
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'date' => $date ,
                'count' => $count ,
                'id' => $id ,
                'total' => $select_total,
            ]);

        }else{
            return view('daily_time_sheet.list-time-sheet', [
                'anwer' => '0' ,
                'id' => $id ,
            ]);
        }
    }
    public function viewsheetadd()
    {       
        $date = date("d/m/Y");
        $yellow = yellowfileModel::all();
        $sheet = timerecordModel::all();
        $count = timerecordModel::count();
        
            return view('daily_time_sheet.time-sheet-create', [
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'date' => $date ,
                'count' => $count ,                
            ]);

      
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

            $yellow = yellowfileModel::where('yf_fileno', $request->input('master_name'))->first();
            $law = DB::table('tb_law')->where('law_id',$request->input('ts_law_id')[$i])->first();
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
                    'ts_id_yf' => $yellow->id_yf ,
                    'ts_no' => $no,
                    'ts_law_id' => $request->input('ts_law_id')[$i],
                    'ts_reate_work' => $law->lw_yf_rates, 
                    'ts_form' => $request->input('ts_form')[$i],
                    'ts_to' => $request->input('ts_to')[$i],
                    'ts_total_time' => $request->input('ts_total_time')[$i],
                    'ts_woek' => $request->input('ts_woek')[$i],
                    'ts_status' => $request->status,
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
    public function selectTimeAjax(Request $request)
    {
        $select = yellowfileModel::where('yf_fileno',$request->master)->first();
        echo $select->yf_time;
    }
    public function selectFixFeeAjax(Request $request)
    {
        $yellow = yellowfileModel::where('yf_fileno',$request->fileno)->first(); // 1 row
        $timesheet = timerecordModel::where('ts_id_yf',$yellow->id_yf)->get(); // many row
        $fixfee = $yellow->yf_fixfee;

        $last_total = 0;
        foreach($timesheet as $_sheet)
        {
            $reate_yellow = $_sheet->ts_reate_work;
            $arrays = explode(':', $_sheet->ts_total_time); 
            $total_all = (intval($arrays[0])*60)+$arrays[1];

            if($reate_yellow == "A"){                
                $total = $total_all;
                $rate = $yellow->yf_rates_a;
            }elseif($reate_yellow == "B"){
                $total = $total_all;
                $rate = $yellow->yf_rates_b;
            }elseif($reate_yellow == "C"){
                $total = $total_all;
                $rate = $yellow->yf_rates_c; 
            }elseif($reate_yellow == "D"){
                $total = $total_all;
                $rate = $yellow->yf_rates_d; 
            }elseif($reate_yellow == "E"){
                $total = $total_all;
                $rate = $yellow->yf_rates_e; 
            }else{ //F
                $total = $total_all;
                $rate = $yellow->yf_rates_f; 
            }
            $last_total += number_format(($total/60)*$rate ,2);
        }
       
        // echo "total->".$last_total." | FixFee -> ".$fixfee;
        echo ($last_total>=$fixfee) ? 1 : 0;
    }
    public function showtimesheet(Request $request)
    {
        $data = [];    
        $select = yellowfileModel::all();
        $i = 1;
        foreach($select as $_val){

            $Client = tb_client::where('id_ct', $_val->id_ct_yf )->first();
            $partner_name = DB::table('tb_partner')->where('pt_id',$_val->yf_partner)->first();
            $count = DB::table('tb_timesheet')->where('ts_id_yf',$_val->id_yf)->count();

            $data['data'][]= array(
                "id" =>  '<a href="timeseetview/'.$_val->id_yf.'">'.$i.'</a>',
                "yf_fileno" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_fileno.'</a>',
                "ct_yf" => '<a href="timeseetview/'.$_val->id_yf.'">'.$Client->ct_fn.'</a>',
                "yf_mtt" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_mtt.'</a>',
                "pt_name" => '<a href="timeseetview/'.$_val->id_yf.'">'.$partner_name->pt_name.'</a>',
                "Status" => ( $count > 0 ? "Complete" : "Padding"),
            );
        $i++; }
        echo json_encode($data);
    }
    public function searchtimesheet(Request $request)
    {
        $type = $request->input('status');
        $select = yellowfileModel::all();
        $data = [];    
        $data2 = [];    
        $data3 = [];    
        $i = 1;
        foreach($select as $_val){

            $Client = tb_client::where('id_ct', $_val->id_ct_yf )->first();
            $partner_name = DB::table('tb_partner')->where('pt_id',$_val->yf_partner)->first();
            $count = DB::table('tb_timesheet')->where('ts_id_yf',$_val->id_yf)->count();

            $data3['data'][]= array(
                "id" =>  '<a href="timeseetview/'.$_val->id_yf.'">'.$i.'</a>',
                "yf_fileno" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_fileno.'</a>',
                "ct_yf" => '<a href="timeseetview/'.$_val->id_yf.'">'.$Client->ct_fn.'</a>',
                "yf_mtt" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_mtt.'</a>',
                "pt_name" => '<a href="timeseetview/'.$_val->id_yf.'">'.$partner_name->pt_name.'</a>',
                "Status" => ( $count > 0 ? "Complete" : "Padding"),
            ); 

            if($count > 0){ // complete
                $data['data'][] = array(
                    "id" =>  '<a href="timeseetview/'.$_val->id_yf.'">'.$i.'</a>',
                    "yf_fileno" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_fileno.'</a>',
                    "ct_yf" => '<a href="timeseetview/'.$_val->id_yf.'">'.$Client->ct_fn.'</a>',
                    "yf_mtt" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_mtt.'</a>',
                    "pt_name" => '<a href="timeseetview/'.$_val->id_yf.'">'.$partner_name->pt_name.'</a>',
                    "Status" => ( $count > 0 ? "Complete" : "Padding"),
                );
            }else{ // padding
                $data2['data'][]= array(
                    "id" =>  '<a href="timeseetview/'.$_val->id_yf.'">'.$i.'</a>',
                    "yf_fileno" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_fileno.'</a>',
                    "ct_yf" => '<a href="timeseetview/'.$_val->id_yf.'">'.$Client->ct_fn.'</a>',
                    "yf_mtt" => '<a href="timeseetview/'.$_val->id_yf.'">'.$_val->yf_mtt.'</a>',
                    "pt_name" => '<a href="timeseetview/'.$_val->id_yf.'">'.$partner_name->pt_name.'</a>',
                    "Status" => ( $count > 0 ? "Complete" : "Padding"),
                ); 
            }
        $i++; }

        if ($type == 0) { // pandding
            echo json_encode($data2);
        } elseif($type == 1) { // complete
            echo json_encode($data);
        }else { // all
            echo json_encode($data3);
        }
        
    }
    public function showDetaileTimesheet(Request $request)
    {
        $data['data'] = [];
        $id = $request->input('id');
        $status = $request->input('status');
        $date = $request->input('date');

        if (!empty($status) && !empty($date)) { 
                
            $yellow = yellowfileModel::where('id_yf',$request->id)->first();
            $sheet = timerecordModel::where('ts_id_yf',$request->id)->where('ts_status',$status)->where('created_at','LIKE',$date.'%')->get();
            $count = timerecordModel::where('ts_id_yf',$request->id)->where('ts_status',$status)->where('created_at','LIKE',$date.'%')->count();

        } else if(!empty($status) && empty($date)) {

            $yellow = yellowfileModel::where('id_yf',$request->id)->first();
            $sheet = timerecordModel::where('ts_id_yf',$request->id)->where('ts_status',$status)->get();
            $count = timerecordModel::where('ts_id_yf',$request->id)->where('ts_status',$status)->count();

        } else if(empty($status) && !empty($date)) {    
           
            $yellow = yellowfileModel::where('id_yf',$request->id)->first();
            $sheet = timerecordModel::where('ts_id_yf',$request->id)->where('created_at','LIKE',$date.'%')->get();
            $count = timerecordModel::where('ts_id_yf',$request->id)->where('created_at','LIKE',$date.'%')->count();
        
        } else {
            $yellow = yellowfileModel::where('id_yf',$request->id)->first();
            $sheet = timerecordModel::where('ts_id_yf',$request->id)->get();
            $count = timerecordModel::where('ts_id_yf',$request->id)->count();
           
        }
            
            $last_total = 0;
            $rate = 0;
            $total = 0;
            $select_total = 0;
            $estimate = $yellow->yf_estimate; // งบประมาณ
            $a = 1;

            if($count>0){
                foreach($sheet as $_val)
                {
                    $arrays = explode(':', $_val->ts_total_time); 
                    $total_all = (intval($arrays[0])*60)+$arrays[1];
                    
                    if($_val->ts_reate_work == 'A')
                    {
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_a;
                    }
                    elseif($_val->ts_reate_work == 'B')
                    {   
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_b;
                    }
                    elseif($_val->ts_reate_work == "C")
                    {
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_c;
                    }
                    elseif($_val->ts_reate_work == "D")
                    {
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_d;
                    }
                    elseif($_val->ts_reate_work == "E")
                    {   
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_e;
                    }else{ // F
                        $total += $total_all;
                        $total_single = $total_all;
                        $rate = $yellow->yf_rates_f;
                    }
                    
                    $select_total = number_format(($total_single/60)*$rate ,2);

                    $data['data'][]= array(
                        "id" =>  $a,
                        "no" => $_val->ts_no,
                        "code" => $_val->ts_law_id,
                        "From" =>$_val->ts_form,
                        "To" => $_val->ts_to,
                        "Time" => date("H:i:s", strtotime($_val->ts_total_time)),
                        "Woek Performed" => $_val->ts_woek,
                        "total" => $select_total,
                        "Rate" => $rate,
                        "delete" => '<button type="button" style="background-color: #ffffff00;border-color: #f0f8ff00;" onclick="deltesheet('.$_val->ts_id.')">
                        <span class="more material-icons md-12">delete</span></button>',
                    );
                $a++; }
            }

        echo json_encode($data);
        
    }
   
}
