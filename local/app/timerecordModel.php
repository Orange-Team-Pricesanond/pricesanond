<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class timerecordModel extends Model
{
    protected $table = 'tb_timesheet';
    protected $fullable = [
        "ts_id" , "ts_id_yf" , "ts_law_id" , "ts_no" , "ts_reate_work" , "ts_form" , "ts_to" , "ts_total_time" ,
         "ts_woek" , "ts_status" , "ts_date" , "created_at" , "updated_at" ,
    ];
}

