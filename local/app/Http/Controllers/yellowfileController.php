<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
use App\partnerModel;
use App\moneyModel;
use App\timerecordModel;
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
        $TimeSheet = timerecordModel::where('ts_id_yf', 1)->get();
        $address = DB::table('tb_address_clients')->get();
       
        return view('yellow_file.index', [
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
        // ---- Set file no
        // $_get = yellowfileModel::orderBy('id_yf', 'DESC')->take(1)->get();
        // $_getlast = $_get->first()->yf_fileno;
        // $num = substr($_getlast,7);
        // $int = (int)$num +1;
        // $date = date("ym");
        // $nofile = "Q-".$date."-".$int;
        //------------------

        $nofile = $request->input('yf_fileno');
        $remark = $request->input('yf_remark');
        $fullname = $request->input('id_ct_yf');
        $matter = $request->input('yf_mtt');
        $currency = $request->input('yf_currency');
        $currencyter = $request->input('yf_currencyter');
        $partner = $request->input('yf_partner');
        $fix = $request->input('yf_fixfee');
        $estimate = $request->input('yf_estimate');
        $dis = $request->input('yf_discount');
        $time = $request->input('yf_time');
        $reate1 = $request->input('yf_rates_a');
        $reate2 = $request->input('yf_rates_b');
        $reate3 = $request->input('yf_rates_c');
        $reate4 = $request->input('yf_rates_d');
        $reate5 = $request->input('yf_rates_e');
        $reate6 = $request->input('yf_rates_f');
        $tex = $request->input('yf_taxnumber');
        $team = $request->input('yf_team');
        //invoice Address
        $branch = $request->input('yf_branch');        
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        // $road = $request->input('yf_road');
        // $district = $request->input('yf_dis');
        // $subdis = $request->input('yf_subdis');
        // $provice = $request->input('yf_provice');
        // $code = $request->input('yf_code');
        // $country = $request->input('yf_country');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');
        //delivery location
        // $branch_dely = $request->input('dy_branch'); 
        $tex_dely = $request->input('dy_taxnumber'); 
        $invname_dely = $request->input('dy_inv_num');
        $address_dely = $request->input('dy_address');
        // $road_dely = $request->input('dy_road');
        // $district_dely = $request->input('dy_dis');
        // $subdis_dely = $request->input('dy_subdis');
        // $provice_dely = $request->input('dy_provice');
        // $code_dely = $request->input('dy_code');
        // $country_dely = $request->input('dy_country');
        $phone_dely = $request->input('dy_phone');
        $fax_dely = $request->input('dy_fax');
        $mail_dely = $request->input('dy_email');
        $atten_dely = $request->input('dy_atten');
        $invtext_dely = $request->input('dy_invioctext');

        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');

        $data = [
            'id_ct_yf' => $fullname,
            'yf_fileno' => $nofile,
            'yf_mtt' => $matter,
            'yf_currency' => $currency,
            'yf_partner' => $partner,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_estimate' => $estimate,
            'yf_discount' => $dis,
            'yf_remark' => $remark,
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
            // 'yf_road' => $road,
            // 'yf_dis' => $district,
            // 'yf_subdis' => $subdis,
            // 'yf_provice' => $provice,
            // 'yf_code' => $code,
            // 'yf_country' => $country,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,

            'dy_taxnumber' => $tex_dely,
            'dy_inv_num' => $invname_dely,
            'dy_address' => $address_dely,
            // 'dy_road' => $road_dely,
            // 'dy_dis' => $district_dely,
            // 'dy_subdis' => $subdis_dely,
            // 'dy_provice' => $provice_dely,
            // 'dy_code' => $code_dely,
            // 'dy_country' => $country_dely,
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
        // dd($data);
        DB::table('tb_yellowfiles')->insert($data);
        return redirect('masterpage');
    }
    public function Master_yellow_edit(Request $request)
    {
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
        $time = $request->input('yf_time');
        $reate1 = $request->input('yf_rates_a');
        $reate2 = $request->input('yf_rates_b');
        $reate3 = $request->input('yf_rates_c');
        $reate4 = $request->input('yf_rates_d');
        $reate5 = $request->input('yf_rates_e');
        $reate6 = $request->input('yf_rates_f');
        $tex = $request->input('yf_taxnumber');
        $team = $request->input('yf_team');
        //invoice Address
        $branch = $request->input('yf_branch');        
        $invname = $request->input('yf_inv_num');
        $address = $request->input('yf_address');
        // $road = $request->input('yf_road');
        // $district = $request->input('yf_dis');
        // $subdis = $request->input('yf_subdis');
        // $provice = $request->input('yf_provice');
        // $code = $request->input('yf_code');
        // $country = $request->input('yf_country');
        $phone = $request->input('yf_phone');
        $fax = $request->input('yf_fax');
        $mail = $request->input('yf_email');
        $atten = $request->input('yf_atten');
        $invtext = $request->input('yf_invioctext');
        //delivery location
        // $branch_dely = $request->input('dy_branch'); 
        $tex_dely = $request->input('dy_taxnumber'); 
        $invname_dely = $request->input('dy_inv_num');
        $address_dely = $request->input('dy_address');
        // $road_dely = $request->input('dy_road');
        // $district_dely = $request->input('dy_dis');
        // $subdis_dely = $request->input('dy_subdis');
        // $provice_dely = $request->input('dy_provice');
        // $code_dely = $request->input('dy_code');
        // $country_dely = $request->input('dy_country');
        $phone_dely = $request->input('dy_phone');
        $fax_dely = $request->input('dy_fax');
        $mail_dely = $request->input('dy_email');
        $atten_dely = $request->input('dy_atten');
        $invtext_dely = $request->input('dy_invioctext');

        $location = $request->input('yf_location');
        $refer = $request->input('yf_refer');
        $confict = $request->input('yf_confict');

        $data = [
            'id_ct_yf' => $fullname,
            'yf_fileno' => $yf_fileno,
            'yf_mtt' => $matter,
            'yf_currency' => $currency,
            'yf_partner' => $partner,
            'yf_currencyter' => $currencyter,
            'yf_fixfee' => $fix,
            'yf_estimate' => $estimate,
            'yf_discount' => $dis,
            'yf_remark' => $remark,
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
            // 'yf_road' => $road,
            // 'yf_dis' => $district,
            // 'yf_subdis' => $subdis,
            // 'yf_provice' => $provice,
            // 'yf_code' => $code,
            // 'yf_country' => $country,
            'yf_phone' => $phone,
            'yf_fax' => $fax,
            'yf_email' => $mail,
            'yf_atten' => $atten,
            'yf_invioctext' => $invtext,

            'dy_taxnumber' => $tex_dely,
            'dy_inv_num' => $invname_dely,
            'dy_address' => $address_dely,
            // 'dy_road' => $road_dely,
            // 'dy_dis' => $district_dely,
            // 'dy_subdis' => $subdis_dely,
            // 'dy_provice' => $provice_dely,
            // 'dy_code' => $code_dely,
            // 'dy_country' => $country_dely,
            'dy_phone' => $phone_dely,
            'dy_fax' => $fax_dely,
            'dy_email' => $mail_dely,
            'dy_atten' => $atten_dely,
            'dy_invioctext' => $invtext_dely,

            'yf_team' => $team,
            'yf_location' => $location,
            'yf_refer' => $refer,
            'yf_confict' => $confict,
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_yellowfiles')->where('id_yf',$request->input('id_yf'))->update($data);
        return redirect('masterpage');
    }
    public function delete($id)
    {
        DB::table('tb_yellowfiles')->where('id_yf',$id)->delete();
        return redirect('masterpage');
    }
    public function editcl($id)
    {
        $client = DB::table('tb_clients')->where('id_ct',$id)->first();
        $address = DB::table('tb_address_clients')->where('ct_ad_ref',$client->ct_ad_ref)->get();
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
        $oldno = intval(substr($select->ct_no,2))+1;
        //run number
        $id = 1;
        $no = sprintf('C-%06d', $oldno);

        $random_number = mt_rand(000000, 999999);
        $name = $request->input('fullname');
        $invoice = $request->input('invoice');
        $country = $request->input('country');
        $tax = $request->input('tax');
        
        $data = DB::table('tb_clients')->insertGetId(
            [
                'ct_no' => $no,
                'ct_fn' => $name,
                'ct_inn' => $invoice,
                'ct_country' => $country,
                'ct_tax' => $tax,
                'ct_ad_ref' => $random_number,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );
        // DB::table('tb_clients')->insert($data);      
        
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
        
        $count_input = count($request->input('Address'));
        for($i=0 ; $i < $count_input ; $i++){
            $address = DB::table('tb_address_clients')->insertGetId(
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
                ]
            );

            // DB::table('tb_address_clients')->insert($address); 
            $log = [
                'id_ct' => $data,
                'id_yf' => $address,
                'id_user' => Auth::user()->id ,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];
            DB::table('tb_logtimesheet')->insert($log); 
        }
        return redirect('masterpage');
    }

}
