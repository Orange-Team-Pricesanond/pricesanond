<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logTimesheet extends Model
{
    protected $table = 'tb_logtimesheet';
    protected $fullable = [
        "id" , "ts_id" , "id_member" , "created_at" , "updated_at" ,
    ];
}
