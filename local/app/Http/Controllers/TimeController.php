<?php

namespace App\Http\Controllers;

use app\Http\Middleware\VerifyCsrfToken;

use Illuminate\Http\Request;
use App\timerecordModel;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
use App\user_detailModel;
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
        $random_number = mt_rand(100000, 999999);
        $date = date("d/m/Y");
        $yellow = yellowfileModel::all();
        $sheet = timerecordModel::all();
        $count = timerecordModel::count();
        
            return view('daily_time_sheet.time-sheet-create', [
                'yellow' => $yellow ,
                'sheet' => $sheet ,
                'count' => $count , 
                'random' => $random_number,               
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
        $num_random = $request->random; 
        $date = date('ym');  
        for($i=0 ; $i < count($request->input('ts_law_id')) ; $i++){

            $random = mt_rand(000000, 999999);    
            $yellow = yellowfileModel::where('yf_fileno', $request->input('master_name')[$i])->first();
            $law = DB::table('user_detail')->where('code',$request->input('ts_law_id')[$i])->first();
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

            $data = [
                'ts_id_yf' => $yellow->id_yf ,
                'ts_date' => $request->input('ts_date')[$i],
                'ts_no' => $no,
                'ts_law_id' => $request->input('ts_law_id')[$i],
                'ts_reate_work' => $law->lw_yf_rates, 
                'ts_form' => $request->input('ts_form')[$i],
                'ts_to' => $request->input('ts_to')[$i],
                'ts_total_time' => $request->input('ts_total_time')[$i],
                'ts_woek' => $request->input('ts_woek')[$i],
                'ts_status' => $request->status,
                'ts_ref' => $random,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $timesheetforaudit = [
                'ts_id_yf' => $yellow->id_yf ,
                'ts_date' => $request->input('ts_date')[$i],
                'ts_no' => $no,
                'ts_law_id' => $request->input('ts_law_id')[$i],
                'ts_reate_work' => $law->lw_yf_rates, 
                'ts_form' => $request->input('ts_form')[$i],
                'ts_to' => $request->input('ts_to')[$i],
                'ts_total_time' => $request->input('ts_total_time')[$i],
                'ts_woek' => $request->input('ts_woek')[$i],
                'ts_status' => $request->status,
                'ts_ref' => $random,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            DB::table('tb_timesheet')->insert($data); 
            DB::table('tb_timesheet_audit')->insert($timesheetforaudit); 

            $data = [
                'ts_ref' => $random,
                'id_member' =>$request->input('id'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('tb_logtimesheet')->insert($data);
        }
        DB::table('logts')->where('log_random', $num_random)->delete();
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
        $code_d = $request->input('Law');

        $yellow = yellowfileModel::where('yf_fileno',$request->fileno)->first(); // 1 row
        $detail = DB::table('tb_yellowfiles_detail')->where('id_yf',$yellow->id_yf)->first(); // 1 row
        $timesheet = timerecordModel::where('ts_id_yf',$yellow->id_yf)->get(); // many row
        $fixfee = $yellow->yf_fixfee;
        $estimate = $yellow->yf_estimate;

        //----------- now add -------------------

        $hrs = $request->hours;
        $min = $request->minutes;
        $now = intval($hrs)+($min/60);

        $select_law = DB::table('user_detail')->where('code',$code_d)->first();

        if($select_law->lw_yf_rates == "A"){
            $yellow_now = $yellow->yf_rates_a;
        }elseif ($select_law->lw_yf_rates == "B") {
            $yellow_now = $yellow->yf_rates_b;
        }elseif ($select_law->lw_yf_rates == "C") {
            $yellow_now = $yellow->yf_rates_c;
        }elseif ($select_law->lw_yf_rates == "D") {
            $yellow_now = $yellow->yf_rates_d;
        }elseif ($select_law->lw_yf_rates == "E") {
            $yellow_now = $yellow->yf_rates_e;
        }else {
            $yellow_now = $yellow->yf_rates_f;   
        }

        $total_now = $now*$yellow_now;

        //--------------- daily -----------------
        $last_total = 0;
        $anwer = 0;
        $total = 0;
        foreach($timesheet as $_sheet)
        {
            $reate_yellow = $_sheet->ts_reate_work;
            $arrays = explode(':', $_sheet->ts_total_time);

            $first_total = number_format(intval($arrays[0])+($arrays[1]/60),2);
            $yellow = DB::table('tb_yellowfiles')->where('id_yf',$_sheet->ts_id_yf)->first();
            
            if($reate_yellow == 'A')
            {
                $total = $first_total*$detail->yfd_rates_a;
            }
            elseif($reate_yellow == 'B')
            {
                $total = $first_total*$detail->yfd_rates_b;
            }
            elseif($reate_yellow == "C")
            {
                $total = $first_total*$detail->yfd_rates_c;
            }
            elseif($reate_yellow == "D")
            {
                $total = $first_total*$detail->yfd_rates_d;
            }
            elseif($reate_yellow == "E")
            {
                $total = $first_total*$detail->yfd_rates_e;
            }else{ // F
                $total = $first_total*$detail->yfd_rates_f;
            }
            $last_total += $total;
        }
        $anwer = $last_total + $total_now;
        echo ($anwer>=$fixfee) ? 1 : 0;
    }
    public function showtimesheet(Request $request)
    {
        $select = timerecordModel::all();
        $count = timerecordModel::count();
        
        $i = 1;
        $sl_time = 0;

        if($count>0){
            foreach($select as $_val){

                $yellow = DB::table('tb_yellowfiles')->where('id_yf',$_val->ts_id_yf)->first();
                $sl_time = $yellow->yf_time;
                
                if($_val->ts_status == 1 ){
                    $status = "Lawyer";
                }elseif( $_val->ts_status == 2 ){
                    $status = "Admin";
                }elseif( $_val->ts_status == 3 ){
                    $status = "Partner";
                }else{
                    $status = "Audit";    
                }

                // search rate
                if($_val->ts_reate_work == 'A')
                {
                    $rate = $yellow->yf_rates_a;
                }
                elseif($_val->ts_reate_work == 'B')
                {   
                    $rate = $yellow->yf_rates_b;
                }
                elseif($_val->ts_reate_work == "C")
                {
                    $rate = $yellow->yf_rates_c;
                }
                elseif($_val->ts_reate_work == "D")
                {
                    $rate = $yellow->yf_rates_d;
                }
                elseif($_val->ts_reate_work == "E")
                {   
                    $rate = $yellow->yf_rates_e;
                }else{ // F
                    $rate = $yellow->yf_rates_f;
                }

                $time = explode(':', $_val->ts_total_time);
                $_total = (($time[0]*60) + ($time[1]))+ ($time[2]/60);

                $Cal = number_format($_total/60 ,2, '.','');
                $cal_rat = number_format($Cal*$rate);
                
                if (strlen($_val->ts_woek) > 100) {
                    $workper = substr($_val->ts_woek,0,100)."...";
                }else{
                    $workper = $_val->ts_woek;
                }

                $data['data'][]= array(
                    "ref" => $yellow->yf_fileno,
                    "id" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$i.'</a>',
                    "date" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_date.'</a>',
                    "code" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_law_id.'</a>',
                    "Form" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_form.'</a>',
                    "To" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_to.'</a>',
                    "Total" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.number_format($_total/60 ,2, '.','').'</a>',
                    "rate" =>  $cal_rat,
                    "work" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$workper.'</a>',
                    "status" => '<a data-toggle="modal" onClick="selectSorttime('.$sl_time.','.$_val->ts_ref.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$status.'</a>',
                    "delete" => '<i class="material-icons md-12">delete</i>',
                );
            $i++; }
        }else{
            $data['data'] = [];
        }
        echo json_encode($data);
    }
    public function searchtimesheet(Request $request)
    {
        $data['data'] = [];

        $dates = $request->input('date');
        $code = $request->input('code');
        $ref = $request->input('ref');
        $atten = $request->input('atten');

       if (!empty($dates)) {
           
            if (!empty($code)) {
               
                if (!empty($ref)) {
                    
                    $ywl = yellowfileModel::where('yf_fileno',$ref)->first();
                    $select = timerecordModel::where('ts_date',$dates)->where('ts_law_id',$code)->where('ts_id_yf',$ywl->id_yf)->get();
                    
                } else { 
                    
                    $select = timerecordModel::where('ts_date',$dates)->where('ts_law_id',$code)->get();

                }

           } else { // have dates | No code
                
                if (!empty($ref)) {  
                    
                    $ywl = yellowfileModel::where('yf_fileno',$ref)->first();
                    $select = timerecordModel::where('ts_date',$dates)->where('ts_id_yf',$ywl->id_yf)->get();

                } else {  // have dates | No code , ref
                    
                    $select = timerecordModel::where('ts_date',$dates)->get();                    
                    
                }

           }
           
       } else { // no date
            
            if (!empty($code)) {
                
                if (!empty($ref)) {
                    
                    $ywl = yellowfileModel::where('yf_fileno',$ref)->first();
                    $select = timerecordModel::where('ts_id_yf',$ywl->id_yf)->get();

                } else { 
                    
                    $select = timerecordModel::where('ts_law_id',$code)->get();
                }

            } else { //  | No code , dates
                
                if (!empty($ref)) {  // have ref | No code , dates

                    $ywl = yellowfileModel::where('yf_fileno',$ref)->first();
                        $select = timerecordModel::where('ts_id_yf',$ywl->id_yf)->get();

                }else{  

                    $select = timerecordModel::all();
                }
            }
       }

        $i = 1;
        if($select->count()>0){
            foreach($select as $_val){

                $yellow = yellowfileModel::where('id_yf',$_val->ts_id_yf)->first();

                if($_val->ts_status == 1 ){
                    $status = "Lawyer";
                }elseif( $_val->ts_status == 2 ){
                    $status = "Admin";
                }elseif( $_val->ts_status == 3 ){
                    $status = "Partner";
                }else{
                    $status = "Audit";    
                }

                // search rate
                if($_val->ts_reate_work == 'A')
                {
                    $rate = $yellow->yf_rates_a;
                }
                elseif($_val->ts_reate_work == 'B')
                {   
                    $rate = $yellow->yf_rates_b;
                }
                elseif($_val->ts_reate_work == "C")
                {
                    $rate = $yellow->yf_rates_c;
                }
                elseif($_val->ts_reate_work == "D")
                {
                    $rate = $yellow->yf_rates_d;
                }
                elseif($_val->ts_reate_work == "E")
                {   
                    $rate = $yellow->yf_rates_e;
                }else{ // F
                    $rate = $yellow->yf_rates_f;
                }

                $time = explode(':', $_val->ts_total_time);
                $_total = (($time[0]*60) + ($time[1]))+ ($time[2]/60);

                $Cal = number_format($_total/60 ,2, '.','');
                $cal_rat = number_format($Cal*$rate);
                
                if (strlen($_val->ts_woek) > 100) {
                    $workper = substr($_val->ts_woek,0,100)."...";
                }else{
                    $workper = $_val->ts_woek;
                }

                $data['data'][]= array(
                    "ref" => $yellow->yf_fileno,
                    "id" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$i.'</a>',
                    "date" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_date.'</a>',
                    "code" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_law_id.'</a>',
                    "Form" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_form.'</a>',
                    "To" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$_val->ts_to.'</a>',
                    "Total" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.number_format($_total/60 ,2, '.','').'</a>',
                    "rate" => $cal_rat,
                    "work" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'"><abbr title="'.$_val->ts_woek.'">'.$workper.'</abbr></a>',
                    "status" => '<a data-toggle="modal" onClick="selectSorttime('.$yellow->yf_time.')" data-target="#pop_matter'.$_val->ts_ref.'">'.$status.'</a>',
                    "delete" => '<i class="material-icons md-12">delete</i>',
                );
            $i++; }
        }else{
            $data['data'] = [];
        }        

        echo json_encode($data);        
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
    public function edittimesheet(Request $request)
    {
        $personal = $request->input('id'); // 1 = Law , 4 = Audit
        $ref = $request->input('ts_ref');

        if($personal == 1){
            $data = [
                'ts_id_yf' => $request->input('ts_id_yf'),
                'ts_law_id' => $request->input('ts_law_id'),
                'ts_no' => $request->input('ts_no'),
                'ts_form' => $request->input('ts_form'),
                'ts_to' => $request->input('ts_to'),
                'ts_total_time' => $request->input('ts_total_time'),
                'ts_woek' => $request->input('ts_woek'),
                'ts_date' => $request->input('ts_date'),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            DB::table('tb_timesheet')->where('ts_ref',$ref)->update($data);
            DB::table('tb_timesheet_audit')->where('ts_ref',$ref)->update($data);

        }else{ // for Audit
            $data = [
                'ts_id_yf' => $request->input('ts_id_yf'),
                'ts_law_id' => $request->input('ts_law_id'),
                'ts_no' => $request->input('ts_no'),
                'ts_form' => $request->input('ts_form'),
                'ts_to' => $request->input('ts_to'),
                'ts_total_time' => $request->input('ts_total_time'),
                'ts_woek' => $request->input('ts_woek'),
                'ts_date' => $request->input('ts_date'),
                'updated_at' => date("Y-m-d H:i:s"),
            ];
            DB::table('tb_timesheet_audit')->where('ts_ref',$ref)->update($data);
        }

        $log = [
            'ts_ref' => $ref,
            'id_member' =>$request->input('id'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_logtimesheet')->insert($log);

        return redirect('dailytime');
        // dd("Complete");
    }
    public function getTextConfirmAjax(Request $request)
    {
        $yellow = DB::table('tb_yellowfiles')->where('yf_fileno',$request->val)->first();
        $cilents = DB::table('tb_clients')->where('id_ct',$yellow->id_ct_yf)->first();

        $text = "Files No. : ".$request->val;
        $text .= "\n Client Name. : ".$cilents->ct_fn;
        $text .= "\n Matter Name. : ".$yellow->yf_mtt;

        echo $text;
    }
    public function saveLogRowAjax(Request $request)
    {
        $random = $request->random;
        $code = $request->law;

        $form = date("Y-m-d H:i:s", strtotime($request->date." ".$request->form));
        $to = date("Y-m-d H:i:s", strtotime($request->date." ".$request->to));
        
        $selectTime = DB::table('logts')->whereBetween('log_ts_form', [$form, $to])->orWhereBetween('log_ts_to', [$form, $to])->where('log_ts_law_id',$code)->get();
        $Count = $selectTime->count();

        if ($Count>0) { 
            echo "False";
        } else {
            $data = [
                'log_random' => $random,
                'log_ts_id_yf' => $request->master,
                'log_ts_law_id' => $request->law,
                'log_ts_form' => $form,
                'log_ts_to' => $to,
                'log_created_at' => date('Y-m-d H:i:s'),
                'log_updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('logts')->insert($data);
            echo "True";
        }
        
        
    }
    

   
}
