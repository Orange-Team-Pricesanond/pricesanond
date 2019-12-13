<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yellowfileModel;
use App\tb_client;
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
    public function index(){
        $yellow = yellowfileModel::all();
        return view('yellowfile', [
            'yellowfile' => $yellow
        ]);
    }
    public function viewClient(){
        $client = tb_client::all();
        return view('yellowfileInsert', [
            'client' => $client
        ]);
    }
    public function Submit(Request $request)
    {
        dd($request);

        $name = $request->input('id_ct_yf');
        $invoice = $request->input('yf_mtt');
        $tax = $request->input('yf_currency');
        $tax = $request->input('yf_currencyter');
        $tax = $request->input('yf_fixfee');
        $tax = $request->input('yf_discount');
        $tax = $request->input('yf_time');
        $tax = $request->input('yf_rates_a');
        $tax = $request->input('yf_rates_b');
        $tax = $request->input('yf_rates_c');
        $tax = $request->input('yf_rates_d');
        $tax = $request->input('yf_rates_e');
        $tax = $request->input('yf_rates_f');
        $tax = $request->input('yf_taxnumber');
        $tax = $request->input('yf_inv_num');
        $tax = $request->input('yf_address');
        $tax = $request->input('yf_road');
        $tax = $request->input('yf_dis');
        $tax = $request->input('yf_subdis');
        $tax = $request->input('yf_provice');
        $tax = $request->input('yf_code');
        $tax = $request->input('yf_country');
        $tax = $request->input('yf_phone');
        $tax = $request->input('yf_fax');
        $tax = $request->input('yf_email');
        $tax = $request->input('yf_atten');
        $tax = $request->input('yf_invioctext');
        $tax = $request->input('yf_location');
        $tax = $request->input('yf_refer');
        $tax = $request->input('yf_confict');
        
        $data = [
            'ct_fn' => $name,
            'ct_inn' => $invoice,
            'ct_tax' => $tax,
            'ct_ad_ref' => $random_number,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        DB::table('tb_clients')->insert($data);
    }
}
