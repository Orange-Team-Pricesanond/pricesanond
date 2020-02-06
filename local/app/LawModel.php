<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawModel extends Model
{
    protected $table = 'users';
    protected $fullable = [
        "id" , "name" , "images" ,"email" ,"phone" ,"user_type" ,
        "password" ,"code" ,"lw_yf_rates" ,"status" ,"created_at" ,"updated_at" ,
    ];
}
