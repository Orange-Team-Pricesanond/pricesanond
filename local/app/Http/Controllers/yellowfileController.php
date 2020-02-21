<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
use App\partnerModel;
use App\moneyModel;
use App\timerecordModel;
use App\logyellowfileModel;
use App\yellowdetailModel;
use App\yellowfilesDetailModel;
use DB;
use Image;

class yellowfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index()
    {
        $yellow =  DB::table('tb_yellowfiles')->join('tb_clients', 'tb_yellowfiles.id_ct_yf', '=', 'tb_clients.id_ct')->get();
        $client = tb_client::all();
        return view('yellowfile', [
            'yellowfile' => $yellow,
            'client' => $client,
        ]);
    }
    public function viewClient()
    {
        $client = tb_client::all();
        $address = addressModel::all();
        return view('yellowfileInsert', [
            'client' => $client ,
            'address' => $address
        ]);
    }
    public function Submityf(Request $request)
    {
        $fullname = $request->input('id_ct_yf');
        $matter = $request->input('yf_mtt');
        $currency = $request->input('yf_currency');
        $currencyter = $request->input('yf_currencyter');
        $fix = $request->input('yf_fixfee');
        $dis = $request->input('yf_discount');
        $time = $request->input('yf_time');
        $reate1 = $request->input('yf_rates_a');
        $reate2 = $request->input('yf_rates_b');
        $reate3 = $request->input('yf_rates_c');
        $reate4 = $request->input('yf_rates_d');
        $reate5 = $request->input('yf_rates_e');
        $reate6 = $request->input('yf_rates_f');
        $tex = $request->input('yf_taxnumber');
        $branch = $request->input('yf_branch');
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        $road = $request->input('yf_road');
        $district = $request->input('yf_dis');
        $subdis = $request->input('yf_subdis');
        $provice = $request->input('yf_provice');
        $code = $request->input('yf_code');
        $country = $request->input('yf_country');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');
        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');
        
        $data = [
            'id_ct_yf' => $fullname,
            'yf_mtt' => $matter,
            'yf_currency' => $currency,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_discount' => $dis,
            'yf_branch' => $branch,
            'yf_time' => $time,
            'yf_rates_a' => $reate1,
            'yf_rates_b' => $reate2,
            'yf_rates_c' => $reate3,
            'yf_rates_d' => $reate4,
            'yf_rates_e' => $reate5,
            'yf_rates_f' => $reate6,
            'yf_taxnumber' => $tex,
            'yf_inv_num' => $invname,
            'yf_address' => $address,
            'yf_road' => $road,
            'yf_dis' => $district,
            'yf_subdis' => $subdis,
            'yf_provice' => $provice,
            'yf_code' => $code,
            'yf_country' => $country,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,
            'yf_location' => $location,
            'yf_refer' => $refer,
            'yf_confict' => $confict,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_yellowfiles')->insert($data);
        return redirect('tasks');
    }
    public function getAddress(Request $request)
    {
        $get = DB::table('tb_address_clients')->where('ct_ad_id',$request->input('id'))->first();
        return json_encode($get);
    }
    public function view($id)
    {
        $client = tb_client::all();
        $address = addressModel::all();
        $sql = DB::table('tb_yellowfiles')->where('id_yf',$id)->first();
        return view('yellowfiledit',[
            'yellows' => $sql,
            'client' => $client ,
            'address' => $address
        ]);
    }
    public function edit(Request $request)
    {
        $fullname = $request->input('id_ct_yf');
        $matter = $request->input('yf_mtt');
        $currency = $request->input('yf_currency');
        $currencyter = $request->input('yf_currencyter');
        $fix = $request->input('yf_fixfee');
        $dis = $request->input('yf_discount');
        $time = $request->input('yf_time');
        $branch = $request->input('yf_branch');
        $reate1 = $request->input('yf_rates_a');
        $reate2 = $request->input('yf_rates_b');
        $reate3 = $request->input('yf_rates_c');
        $reate4 = $request->input('yf_rates_d');
        $reate5 = $request->input('yf_rates_e');
        $reate6 = $request->input('yf_rates_f');
        $tex = $request->input('yf_taxnumber');
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        $road = $request->input('yf_road');
        $district = $request->input('yf_dis');
        $subdis = $request->input('yf_subdis');
        $provice = $request->input('yf_provice');
        $code = $request->input('yf_code');
        $country = $request->input('yf_country');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');
        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');
        
        $data = [
            'id_ct_yf' => $fullname,
            'yf_mtt' => $matter,
            'yf_branch' => $branch,
            'yf_currency' => $currency,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_discount' => $dis,
            'yf_time' => $time,
            'yf_rates_a' => $reate1,
            'yf_rates_b' => $reate2,
            'yf_rates_c' => $reate3,
            'yf_rates_d' => $reate4,
            'yf_rates_e' => $reate5,
            'yf_rates_f' => $reate6,
            'yf_taxnumber' => $tex,
            'yf_inv_num' => $invname,
            'yf_address' => $address,
            'yf_road' => $road,
            'yf_dis' => $district,
            'yf_subdis' => $subdis,
            'yf_provice' => $provice,
            'yf_code' => $code,
            'yf_country' => $country,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,
            'yf_location' => $location,
            'yf_refer' => $refer,
            'yf_confict' => $confict,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_yellowfiles')->update($data);
        return redirect('tasks');
    }
    //----------- Master File --------------
    
    public function viewAddress()
    {   
        $random = mt_rand(000000, 999999);
        $partner = partnerModel::all();
        $client = tb_client::all();
        $money = moneyModel::all();
        $yellowfile = yellowfileModel::all();
        $TimeSheet = timerecordModel::all();
        $address = addressModel::all();
        $datenow = date("Y-m-d");

        return view('yellow_file.index', [
            'datenow' => $datenow,
            'address' => $address,
            'partner' => $partner,
            'client' => $client,
            'yellowfile' => $yellowfile,
            'fileno' => $random,
            'money' => $money,
            'record' => $TimeSheet,
        ]);
    }
    public function Master_yellow_submit(Request $request)
    {
        if (!empty($request->input('month'))) {
            $month = implode(',',$request->input('month'));
        } else {
            $month = '';
        }
        
        $datenow = date("Y-m-d H:i:s");
        $id = $request->input('id');
        $nofile = $request->input('yf_fileno');
        $remark = $request->input('yf_remark');
        $fullname = $request->input('id_ct_yf');
        $matter = $request->input('yf_mtt');
        $group = $request->input('yt_group');
        $currency = $request->input('yf_currency');
        $currencyter = $request->input('yf_currencyter');
        $partner = $request->input('yf_partner');
        $fix = $request->input('yf_fixfee');
        $estimate = $request->input('yf_estimate');
        $dis = $request->input('yf_discount');
        $time = $request->input('time');
        // About Rate
        $reate1 = $request->input('yf_rates_a');
        $reate2 = $request->input('yf_rates_b');
        $reate3 = $request->input('yf_rates_c');
        $reate4 = $request->input('yf_rates_d');
        $reate5 = $request->input('yf_rates_e');
        $reate6 = $request->input('yf_rates_f');

        $tex = $request->input('yf_taxnumber');
        $team = $request->input('yf_team');

        $branch = $request->input('yf_branch');        
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');

        $tex_dely = $request->input('dy_taxnumber'); 
        $invname_dely = $request->input('dy_inv_num');
        $address_dely = $request->input('dy_address');
        $phone_dely = $request->input('dy_phone');
        $fax_dely = $request->input('dy_fax');
        $mail_dely = $request->input('dy_email');
        $atten_dely = $request->input('dy_atten');

        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');
        $both = $request->input('both');
        $vat = $request->input('yf_vat');
        
        $data = DB::table('tb_yellowfiles')->insertGetId(
            [
            'id_ct_yf' => $fullname,
            'yf_fileno' => $nofile,
            'yf_mtt' => $matter,
            'yt_group' => $group,
            'yf_currency' => $currency,
            'yf_partner' => $partner,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_fixfee_month' => $month,
            'yf_estimate' => $estimate,
            'yf_discount' => $dis,
            'yf_vat' => $vat,
            'yf_remark' => $remark,
            'yf_branch' => $branch,
            'yf_time' => $time,
            // 'yf_rates_a' => $reate1,
            // 'yf_rates_b' => $reate2,
            // 'yf_rates_c' => $reate3,
            // 'yf_rates_d' => $reate4,
            // 'yf_rates_e' => $reate5,
            // 'yf_rates_f' => $reate6,
            'yf_taxnumber' => $tex,
            'yf_inv_num' => $invname,
            'yf_address' => $address,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,
            'yf_bothcurrency' => $both,   

            'dy_taxnumber' => $tex_dely,
            'dy_inv_num' => $invname_dely,
            'dy_address' => $address_dely,
            'dy_fax' => $fax_dely,
            'dy_email' => $mail_dely,
            'dy_atten' => $atten_dely,

            'yf_team' => $team,
            'yf_location' => $location,
            'yf_refer' => $refer,
            'yf_confict' => $confict,      
            'created_at' => $datenow,
            'updated_at' => $datenow,
        ]);
       
        $log = [
            'id_ct' => $fullname, 
            'id_yf' => $data, 
            'id_user' => $id,
        ];
        DB::table('tb_logyellowfile')->insert($log);
        
        $data2 = 
        [
            'id_yf' => $data,
            'yfd_rates_a' => $reate1,
            'yfd_rates_b' => $reate2,
            'yfd_rates_c' => $reate3,
            'yfd_rates_d' => $reate4,
            'yfd_rates_e' => $reate5,
            'yfd_rates_f' => $reate6,
            'yfd_setdate' => $datenow,
            'yfd_update' => $datenow,
            'yfd_create' => $datenow,
             
        ];
        DB::table('tb_yellowfiles_detail')->insert($data2);
        
        return redirect('masterpage');
    }
    public function getYellow(Request $request)
    {
        if($request->input('id')){
            $yellowfile = yellowfileModel::where('yt_group',$request->input('id'))->get();
        }else{
            $yellowfile = yellowfileModel::all();
        }
       
        $data['data'] = [];                
        $i = 1; 

        foreach($yellowfile as $val){

            $client_name = DB::table('tb_clients')->where('id_ct',$val->id_ct_yf)->first();
            $partner_name = DB::table('tb_partner')->where('pt_id',$val->yf_partner)->first();
            $count = DB::table('tb_timesheet')->where('ts_id_yf',$val->id_yf)->count();

            $data['data'][] = array(
                "No" =>  '<a href="yellow-file/'.$val->id_yf.'">'.$i.'</a>',
                "File" => '<a href="yellow-file/'.$val->id_yf.'">'.$val->yf_fileno.'</a>',
                "Client" => '<a href="yellow-file/'.$val->id_yf.'">'.$client_name->ct_fn.'</a>',
                "Matter" => '<a href="yellow-file/'.$val->id_yf.'">'.$partner_name->pt_name.'</a>',
                "Person" => '<a href="yellow-file/'.$val->id_yf.'">'.$val->yf_mtt.'</a>',
                "Status" => '<a href="yellow-file/'.$val->id_yf.'">'.( $count > 0 ? "Complete" : "Padding").'</a>',
                "Active" => ' <span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                    <a class="dropdown-item" onclick="delete_yellow('.$val->id_yf.')">Delete</a>
                </div>',
            );

        $i++; }
        echo json_encode($data);  

    }
    public function Master_yellow_edit(Request $request)
    {
        $month = implode(',',$request->input('month'));
        $yf_fileno = $request->input('yf_fileno');
        $remark = $request->input('yf_remark');
        $fullname = $request->input('id_ct_yf');
        $matter = $request->input('yf_mtt');
        $currency = $request->input('yf_currency');
        $currencyter = $request->input('yf_currencyter');
        $partner = $request->input('yf_partner');
        $fix = $request->input('yf_fixfee');
        $estimate = $request->input('yf_estimate');
        $dis = $request->input('yf_discount');
        $time = $request->input('time');
        // $reate1 = $request->input('yf_rates_a');
        // $reate2 = $request->input('yf_rates_b');
        // $reate3 = $request->input('yf_rates_c');
        // $reate4 = $request->input('yf_rates_d');
        // $reate5 = $request->input('yf_rates_e');
        // $reate6 = $request->input('yf_rates_f');
        $tex = $request->input('yf_taxnumber');
        $team = $request->input('yf_team');
        $vat = $request->input('yf_vat');
        $group = $request->input('yt_group');
        //invoice Address
        $branch = $request->input('yf_branch');        
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');
     
        $tex_dely = $request->input('dy_taxnumber'); 
        $invname_dely = $request->input('dy_inv_num');
        $address_dely = $request->input('dy_address');
        $phone_dely = $request->input('dy_phone');
        $fax_dely = $request->input('dy_fax');
        $mail_dely = $request->input('dy_email');
        $atten_dely = $request->input('dy_atten');
        $invtext_dely = $request->input('dy_invioctext');

        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');

        $data = 
        [
            'id_ct_yf' => $fullname,
            'yf_fileno' => $yf_fileno,
            'yf_mtt' => $matter,
            'yt_group' => $group,
            'yf_currency' => $currency,
            'yf_partner' => $partner,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_fixfee_month' => $month,
            'yf_estimate' => $estimate,
            'yf_discount' => $dis,
            'yf_vat' => $vat,
            'yf_remark' => $remark,
            'yf_branch' => $branch,
            'yf_time' => $time,
            // 'yf_rates_a' => $reate1,
            // 'yf_rates_b' => $reate2,
            // 'yf_rates_c' => $reate3,
            // 'yf_rates_d' => $reate4,
            // 'yf_rates_e' => $reate5,
            // 'yf_rates_f' => $reate6,
            'yf_taxnumber' => $tex,
            'yf_inv_num' => $invname,
            'yf_address' => $address,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,
            'yf_bothcurrency' => $request->input('both'),
            'dy_taxnumber' => $tex_dely,
            'dy_inv_num' => $invname_dely,
            'dy_address' => $address_dely,
            'dy_phone' => $phone_dely,
            'dy_fax' => $fax_dely,
            'dy_email' => $mail_dely,
            'dy_atten' => $atten_dely,
            'dy_invioctext' => $invtext_dely,
            'yf_team' => $team,
            'yf_location' => $location,
            'yf_refer' => $refer,
            'yf_confict' => $confict,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_yellowfiles')->where('id_yf',$request->input('id_yf'))->update($data);

        $log = [
            'id_ct' => $fullname, 
            'id_yf' => $request->input('id_yf'), 
            'id_user' => $request->input('id')
        ];
        DB::table('tb_logyellowfile')->insert($log);  

        return redirect('masterpage');
    }
    public function delete(Request $request)
    {
        DB::table('tb_yellowfiles')->where('id_yf',$request->id)->delete();
        echo 'complete';
    }
    public function editcl($id)
    {
        $client = DB::table('tb_clients')->where('id_ct',$id)->first();
        $address = addressModel::where('ct_ad_ref',$client->ct_ad_ref)->get();
        return view('yellow_file.client_edit', [
            'client' => $client ,
            'address' => $address
        ]);
    }
    public function editSubmit(Request $request)
    {

        $inv = [];
        for($i=0 ; $i < count($request->input('Address')) ; $i++){   
            $name = "invoicepotion".$i."";
            $inv[] = $request->input($name);
        }   

        $client = DB::table('tb_clients')->where('id_ct',$request->input('id'))->first();
        $ct_ad_ref = $client->ct_ad_ref;

        $data = [
            'ct_fn' => $request->input('fullname'),
            'ct_inn' => $request->input('invoice'),
            'ct_tax' => $request->input('tax'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if(!empty($request->file('images'))){
                
            $oldpic = DB::table('tb_clients')->where('id_ct',$request->input('id'))->first();
            @unlink(public_path('/client/').$oldpic->ct_images); // delete old picture
        
            $file = $request->file('images');
            $ext = $file->getClientOriginalExtension();
        
            $imagename = '';
            $imagename = date('Y-m-d-H-i-s').rand().'.'.$ext;
        
            $destinationPath_origi = public_path('/client/');            
            $thumb_img_origi = Image::make($file->getRealPath());
            $thumb_img_origi->save($destinationPath_origi.$imagename);

            $data['ct_images'] = $imagename;
        }

        DB::table('tb_clients')->where('id_ct',$request->input('id'))->update($data);
        $count_input = count($request->input('Address'));
        for($i=0 ; $i < $count_input ; $i++){
            
            if(!empty($request->input('ct_ad_id')[$i])){ // update
                $address = [
                    'ct_ad' => $request->input('Address')[$i],
                    'ct_ad_branch' => $request->input('Branch')[$i],
                    'ct_ad_phone' => $request->input('phone')[$i],
                    'ct_ad_fax' => $request->input('Fax')[$i],
                    'ct_ad_mail' => $request->input('email')[$i],
                    'ct_ad_country' => $request->input('Country')[$i],
                    'ct_ad_atten' => $request->input('attent')[$i],
                    'ct_ad_invoice' => $inv[$i], 
                    'ct_ad_ref' => $ct_ad_ref,
                    'updated_at' => date('Y-m-d H:i:s'), 
                ];
                DB::table('tb_address_clients')->where('ct_ad_id',$request->input('ct_ad_id')[$i])->update($address);
            }else{ // Insert
                $address = [
                    'ct_ad' => $request->input('Address')[$i],
                    'ct_ad_branch' => $request->input('Branch')[$i],
                    'ct_ad_phone' => $request->input('phone')[$i],
                    'ct_ad_fax' => $request->input('Fax')[$i],
                    'ct_ad_mail' => $request->input('email')[$i],
                    'ct_ad_country' => $request->input('Country')[$i],
                    'ct_ad_atten' => $request->input('attent')[$i],
                    'ct_ad_invoice' => $inv[$i], 
                    'ct_ad_ref' => $ct_ad_ref,
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at' => date('Y-m-d H:i:s'), 
                ];
                DB::table('tb_address_clients')->insert($address);
            }
        }   
        return redirect('masterpage');
    }    
    public function Submitcl(Request $request)
    {
        $select = tb_client::orderBy('id_ct', 'DESC')->take(1)->first();
        if(!$select){
            $no = "C-000001";
        }else{
            //run number
            $oldno = intval(substr($select->ct_no,2))+1;
            $no = sprintf('C-%06d', $oldno);
        }
        
        $id = 1;
        $random_number = mt_rand(000000, 999999);
        $name = $request->input('fullname');
        $invoice = $request->input('invoice');
        $country = $request->input('country');
        $tax = $request->input('tax');
        
        $data = 
            [
                'ct_no' => $no,
                'ct_fn' => $name,
                'ct_inn' => $invoice,
                'ct_country' => $country,
                'ct_tax' => $tax,
                'ct_ad_ref' => $random_number,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
        
        if(!empty($request->file('images'))){
                
                $oldpic = DB::table('tb_clients')->where('id_ct',$request->input('id'))->first();
                @unlink(public_path('/client/').$oldpic->ct_images); // delete old picture
            
                $file = $request->file('images');
                $ext = $file->getClientOriginalExtension();
            
                $imagename = '';
                $imagename = date('Y-m-d-H-i-s').rand().'.'.$ext;
            
                $destinationPath_origi = public_path('/client/');            
                $thumb_img_origi = Image::make($file->getRealPath());
                $thumb_img_origi->save($destinationPath_origi.$imagename);

                $data['ct_images'] = $imagename;
        }   
        DB::table('tb_clients')->insert($data);      
        $count_input = count($request->input('Address'));
        for($i=0 ; $i < $count_input ; $i++){
            $address =
                [
                    'ct_ad' => $request->input('Address')[$i],
                    'ct_ad_branch' => $request->input('Branch')[$i],
                    'ct_ad_phone' => $request->input('phone')[$i],
                    'ct_ad_fax' => $request->input('Fax')[$i],
                    'ct_ad_mail' => $request->input('email')[$i],
                    'ct_ad_country' => $request->input('Country')[$i],
                    'ct_ad_atten' => $request->input('attent')[$i],
                    'ct_ad_invoice' => $request->input('invoicepotion'.$i.'')[$i],
                    'ct_ad_country' => $request->input('ct_ad_country')[$i],
                    'ct_ad_ref' => $random_number, 
                    'created_at' => date('Y-m-d H:i:s'), 
                    'updated_at' => date('Y-m-d H:i:s'), 
                ];

            DB::table('tb_address_clients')->insert($address);             
        }
        return redirect('masterpage');
    }
    public function showyellow($id)
    {
       $select = DB::table('tb_yellowfiles')->where('id_yf',$id)->first();
       $client = tb_client::all();
       $partner = partnerModel::all();
       $address = addressModel::all();
       $detail = DB::table('tb_yellowfiles_detail')->where('id_yf',$id)->get();
       $TimeSheet = timerecordModel::where('ts_id_yf', $id)->get();

       return view('yellow_file.yellow-file',[
           'yellows' => $select,
           'detail' => $detail,
           'client' => $client,
           'partner' => $partner,
           'address' => $address,
           'record' => $TimeSheet,
       ]);
    }
    public function rates(Request $request)
    {
        if ($request->input('option') == '1') { // where group
            $select = DB::table('tb_yellowfiles')->where('yt_group',$request->input('group'))->get();
            foreach($select as $_val){
                $data = [
                    'id_yf' => $_val->id_yf,
                    'yfd_rates_a' => $request->input('yf_rates_a'),
                    'yfd_rates_b' => $request->input('yf_rates_b'),
                    'yfd_rates_c' => $request->input('yf_rates_c'),
                    'yfd_rates_d' => $request->input('yf_rates_d'),
                    'yfd_rates_e' => $request->input('yf_rates_e'),
                    'yfd_rates_f' => $request->input('yf_rates_f'),
                    'yfd_style' => $request->input('option'),
                    'yfd_setdate' => $request->input('adjust'),
                    'yfd_update' => date("Y-m-d H:i:s"),
                    'yfd_create' => date("Y-m-d H:i:s"),
                ];
                DB::table('tb_yellowfiles_detail')->insert($data);
            }                
        }elseif ($request->input('option') == '2') { // where partner
            $select = DB::table('tb_yellowfiles')->where('yf_partner',$request->input('partner'))->get();
            foreach($select as $_val){
                $data = [
                    'id_yf' => $_val->id_yf,
                    'yfd_rates_a' => $request->input('yf_rates_a'),
                    'yfd_rates_b' => $request->input('yf_rates_b'),
                    'yfd_rates_c' => $request->input('yf_rates_c'),
                    'yfd_rates_d' => $request->input('yf_rates_d'),
                    'yfd_rates_e' => $request->input('yf_rates_e'),
                    'yfd_rates_f' => $request->input('yf_rates_f'),
                    'yfd_style' => $request->input('option'),
                    'yfd_setdate' => $request->input('adjust'),
                    'yfd_update' => date("Y-m-d H:i:s"),
                    'yfd_create' => date("Y-m-d H:i:s"),
                ];
                DB::table('tb_yellowfiles_detail')->insert($data);
            }      
        }elseif ($request->input('option') == '3') { // where hold work
            $count = DB::table('tb_timesheet_audit')->where('ts_status','1')->count();
            $sql = DB::table('tb_timesheet_audit')->where('ts_status','1')->get();
            foreach($sql as $_val){
                $array[] = $_val->ts_id_yf;
            }
            $result = array_unique($array);
            $items = DB::table('tb_yellowfiles')->whereIn('id_yf', $result)->get();
            foreach($items as $_val){
                $data = [
                    'id_yf' => $_val->id_yf,
                    'yfd_rates_a' => $request->input('yf_rates_a'),
                    'yfd_rates_b' => $request->input('yf_rates_b'),
                    'yfd_rates_c' => $request->input('yf_rates_c'),
                    'yfd_rates_d' => $request->input('yf_rates_d'),
                    'yfd_rates_e' => $request->input('yf_rates_e'),
                    'yfd_rates_f' => $request->input('yf_rates_f'),
                    'yfd_style' => $request->input('option'),
                    'yfd_setdate' => $request->input('adjust'),
                    'yfd_update' => date("Y-m-d H:i:s"),
                    'yfd_create' => date("Y-m-d H:i:s"),
                ];
                DB::table('tb_yellowfiles_detail')->insert($data);
            }
                
        }else{ // val = 0
            $data = [
                'id_yf' => $request->input('file_no'),
                'yfd_rates_a' => $request->input('yf_rates_a'),
                'yfd_rates_b' => $request->input('yf_rates_b'),
                'yfd_rates_c' => $request->input('yf_rates_c'),
                'yfd_rates_d' => $request->input('yf_rates_d'),
                'yfd_rates_e' => $request->input('yf_rates_e'),
                'yfd_rates_f' => $request->input('yf_rates_f'),
                'yfd_style' => $request->input('option'),
                'yfd_setdate' => $request->input('adjust'),
                'yfd_update' => date("Y-m-d H:i:s"),
                'yfd_create' => date("Y-m-d H:i:s"),
            ];
            DB::table('tb_yellowfiles_detail')->insert($data);
        }
        return redirect('masterpage');
    }
   


}
