<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yellowfileModel;
use App\tb_client;
use App\addressModel;
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
        $yellow =  DB::table('tb_yellowfiles')->join('tb_clients', 'tb_yellowfiles.id_ct_yf', '=', 'tb_clients.id_ct');
        // $yellow = yellowfileModel::all();
        return view('yellowfile', [
            'yellowfile' => $yellow
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
        // dd($data);
        DB::table('tb_yellowfiles')->insert($data);
        return redirect('task');
    }
    public function getAddress(Request $request)
    {
        $get = DB::table('tb_address_clients')->where('ct_ad_id',$request->input('id'))->first();
        return json_encode($get);
    }
}
