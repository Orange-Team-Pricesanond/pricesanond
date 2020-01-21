<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logTimesheet extends Model
{
    protected $table = 'tb_logtimesheet';
    protected $fullable = [
        "id" , "ts_ref" , "id_member" , "created_at" , "updated_at" ,
    ];
}
