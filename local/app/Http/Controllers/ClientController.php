<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tb_client;
use App\ClientModel;
use DB;
use Image;


class ClientController extends Controller
{
    public function index()
    {
        $client = tb_client::all();
        return view('about', [
            'client' => $client
        ]);
    }
    
    public function Submit(Request $request)
    {
        $random_number = mt_rand(000000, 999999);
        
        $name = $request->input('fullname');
        $invoice = $request->input('invoice');
        $tax = $request->input('tax');
        
        $data = [
            'ct_fn' => $name,
            'ct_inn' => $invoice,
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
            $address = [
                'ct_ad' => $request->input('Address')[$i],
                'ct_ad_branch' => $request->input('Branch')[$i],
                'ct_ad_road' => $request->input('Road')[$i],
                'ct_ad_province' => $request->input('Province')[$i],
                'ct_ad_area' => $request->input('Area')[$i],
                'ct_ad_subarea' => $request->input('Subarea')[$i],
                'ct_ad_code' => $request->input('Postal')[$i],
                'ct_ad_phone' => $request->input('phone')[$i],
                'ct_ad_fax' => $request->input('Fax')[$i],
                'ct_ad_mail' => $request->input('email')[$i],
                'ct_ad_country' => $request->input('Country')[$i],
                'ct_ad_atten' => $request->input('attent')[$i],
                'ct_ad_invoice' => $request->input('invoicepotion')[$i], 
                'ct_ad_ref' => $random_number, 
                'created_at' => date('Y-m-d H:i:s'), 
                'updated_at' => date('Y-m-d H:i:s'), 
            ];
            DB::table('tb_address_clients')->insert($address);  
        }
            
        return redirect('about');
    }
    
    public function view($id)
    {
        $sql = DB::table('tb_clients')->where('id_ct',$id)->first();
        return view('clientedit',[
            'client' => $sql
        ]);
    }
    
    public function edit(Request $request)
    {     
        
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
        return redirect('about');
    }
    
    public function delete($id)
    {
        
        $oldpic = DB::table('tb_clients')->where('id_ct',$id)->first();
        $serch = DB::table('tb_address_clients')->where('ct_ad_ref',$oldpic->ct_ad_ref)->get();

        if(!empty($serch)){
            DB::table('tb_address_clients')->where('ct_ad_ref',$oldpic->ct_ad_ref)->delete();
        }
        @unlink(public_path('/client/').$oldpic->ct_images); // delete old picture
        DB::table('tb_clients')->where('id_ct',$id)->delete();
        
        return redirect('about');
    }   


    
    
}
