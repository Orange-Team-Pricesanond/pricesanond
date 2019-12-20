<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logyellowfileModel extends Model
{
    protected $table = 'tb_logyellowfile';
    protected $fullable = [
        "logc_id" , "id_ct" , "id_yf" , "id_user" , "updated_at" ,
    ];
}