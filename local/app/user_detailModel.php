<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_detailModel extends Model
{
    protected $table = 'user_detail';
    protected $fullable = [
        "id_duser" , "id" , "code" , "lw_yf_rates" , "updated_at" , "create_at" , 

    ];
}
