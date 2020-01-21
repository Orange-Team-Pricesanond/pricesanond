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
use App\User;
use DB;
use Image;

class PersonalController extends Controller
{    
    public function index(Request $request)
    {
        $User = User::all();
        return view('personal.index');
    }
    public function getPersonal(Request $request)
    {
        $data['data'] = [];
        $i = 1;    
        $personal = User::all();
        foreach($personal as $_val){
            //1 = lawyer , 2 = admin , 3 = partner , 4 = audit	
            if($_val->user_type == 1){
                $Role = 'LAWYER';
            }elseif ($_val->user_type == 2){
                $Role = 'ADMIN';    
            }elseif ($_val->user_type == 3) {
                $Role = 'PARTNER';
            }else {
                $Role = 'AUDIT';
            }

            $data['data'][] = array(
                "Pic" => $_val->images ,
                //<div class="img-member active"><div class="thumb"><img src="../../img/member/member_2.jpg"></div></div>
                "Name" => '<div>'.$_val->name.'</div><div><span class="text-grey">Code</span><strong class="text-blue ml-2">'.(($_val->code != null) ? $_val->code : '-').'</strong>
                </div>',
                "Role" => '<div class="d-block py-2 badge badge-pill badge-secondary">'.$Role.'</div>',
                "Email" => '<div>'.$_val->email.'</div><div class="text-grey">Email</div>',
                "Phone" => '<div>'.$_val->phone.'</div> <div class="text-grey">Phone</div>',
                "Status" => ($_val->status == 0)? 'Inactive' : 'Active',
            );

        $i++; }
        echo json_encode($data);  
    }
}
