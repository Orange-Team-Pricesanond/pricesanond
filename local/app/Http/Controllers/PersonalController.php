<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
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
        return view('personal.index',[
            'userlist' => $User
        ]);
    }
    public function getPersonal(Request $request)
    {
        
        $data['data'] = [];                
        $i = 1;    

        if(!empty($request->input('status'))){
            
            if ($request->input('status') == "ALL") {
                if (!empty($request->input('name'))) {
                    $personal = User::where('name', 'like', '%'.$request->input('name').'%')->get();
                }else{
                    $personal = User::all();
                }

            }elseif ($request->input('status') == "A") {
                if (!empty($request->input('name'))) {
                    $personal = User::where('status','A')->where('name', 'like', '%'.$request->input('name').'%')->get();
                }else{
                    $personal = User::where('status','A')->get();
                }

            }else{ // Inactive
                if (!empty($request->input('name'))) {
                    $personal = User::where('status','N')->where('name', 'like', '%'.$request->input('name').'%')->get();
                }else{
                    $personal = User::where('status','N')->get();
                }
            }
            
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
                if(!empty($_val->images)){
                    $imgval = '<div class="img-member active">
                        <div class="thumb">
                            <img src="local/public/user/'.$_val->images.'">
                        </div>
                    </div>';
                }else{
                    $imgval = '<p style="color: darkgray;">Not Found</p>';
                }
    

                $data['data'][] = array(
                    "Pic" =>  $imgval,
                    "Name" => '<div onclick="openpreson('.$_val->id.')">'.$_val->name.'</div><div><span class="text-grey">Code</span><strong class="text-blue ml-2">'.(($_val->code != null) ? $_val->code : '-').'</strong>
                    </div>',
                    "Role" => '<div onclick="openpreson('.$_val->id.')" class="d-block py-2 badge badge-pill badge-secondary">'.$Role.'</div>',
                    "Email" => '<div onclick="openpreson('.$_val->id.')">'.$_val->email.'</div><div class="text-grey">Email</div>',
                    "Phone" => '<div onclick="openpreson('.$_val->id.')">'.$_val->phone.'</div> <div class="text-grey">Phone</div>',
                    "Status" => ($_val->status == 'N')? 'Inactive' : 'Active',
                    "action" => '<span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                        <button class="dropdown-item d-flex justify-content-between align-items-center" onclick="delete_personal('.$_val->id.')">Delete</button>
                        <button class="dropdown-item d-flex justify-content-between align-items-center" onclick="clone_personal('.$_val->id.')">Copy</button>
                    </div>
                    ',
                );
    
            $i++; }
            
        }else{

            if (!empty($request->input('name'))) {
                $personal = User::where('name', 'like', '%'.$request->input('name').'%')->get();
            }else{
                $personal = User::all();
            }

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
                if(!empty($_val->images)){
                    $imgval = '<div class="img-member active">
                        <div class="thumb">
                            <img src="local/public/user/'.$_val->images.'">
                        </div>
                    </div>';
                }else{
                    $imgval = '<p style="color: darkgray;">Not Found</p>';
                }
    
                $data['data'][] = array(
                    "Pic" =>  $imgval,
                    "Name" => '<div onclick="openpreson('.$_val->id.')">'.$_val->name.'</div><div><span class="text-grey">Code</span><strong class="text-blue ml-2">'.(($_val->code != null) ? $_val->code : '-').'</strong>
                    </div>',
                    "Role" => '<div onclick="openpreson('.$_val->id.')" class="d-block py-2 badge badge-pill badge-secondary">'.$Role.'</div>',
                    "Email" => '<div onclick="openpreson('.$_val->id.')">'.$_val->email.'</div><div class="text-grey">Email</div>',
                    "Phone" => '<div onclick="openpreson('.$_val->id.')">'.$_val->phone.'</div> <div class="text-grey">Phone</div>',
                    "Status" => ($_val->status == 'N')? 'Inactive' : 'Active',
                    "action" => '<span class="more material-icons md-14" id="ac_dts_1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">more_vert</span>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="ac_dts_1">
                        <button class="dropdown-item d-flex justify-content-between align-items-center" onclick="delete_personal('.$_val->id.')">Delete</button>
                        <button class="dropdown-item d-flex justify-content-between align-items-center" onclick="clone_personal('.$_val->id.')">Copy</button>
                    </div>',
                );
    
            $i++; }
        }
        
        echo json_encode($data);  
    }
    public function inserpersonal(Request $request)
    {
        $fullname = $request->input('name');
        $code = $request->input('code');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $role = $request->input('role');
        $status = $request->input('status');
        $pass =   $request->input('password');

        $data = [
            'name' => $fullname,
            'code' => $code,
            'email' => $email,
            'phone' => $phone,
            'password' =>  Hash::make($pass),
            'user_type' => $role,
            'status' => $status,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        if(!empty($request->file('file'))){
                
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
        
            $imagename = '';
            $imagename = date('Y-m-d-H-i-s').rand().'.'.$ext;
        
            $destinationPath_origi = public_path('/user/');            
            $thumb_img_origi = Image::make($file->getRealPath());
            $thumb_img_origi->save($destinationPath_origi.$imagename);

            $data['images'] = $imagename;
        }   
        User::insert($data); 
        return redirect('personal');

    }
    public function delete(Request $request)
    {
        $oldpic = DB::table('users')->where('id',$request->id)->first();
        @unlink(public_path('/user/').$oldpic->ct_images); // delete old picture

        DB::table('users')->where('id',$request->id)->delete();
        echo 'complete';
    }
    public function update(Request $request)
    {
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'user_type' => $request->input('role'),
            'code' => $request->input('code'),
            'status' => $request->input('status'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        if(!empty($request->file('file'))){
                
            $oldpic = DB::table('users')->where('id',$request->input('id_personal'))->first();
            @unlink(public_path('/user/').$oldpic->images); // delete old picture
        
            $file = $request->file('file');
            $ext = $file->getClientOriginalExtension();
        
            $imagename = '';
            $imagename = date('Y-m-d-H-i-s').rand().'.'.$ext;
        
            $destinationPath_origi = public_path('/user/');            
            $thumb_img_origi = Image::make($file->getRealPath());
            $thumb_img_origi->save($destinationPath_origi.$imagename);

            $data['images'] = $imagename;
        } 

        DB::table('users')->where('id',$request->input('id_personal'))->update($data);
        return redirect('personal');

    }
}
