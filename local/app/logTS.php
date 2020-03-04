<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logTS extends Model
{
    protected $table = 'logTS';
    protected $fullable = [
        
         "id" , "log_random" , "log_ts_id_yf" , "log_ts_law_id" , "log_ts_reate_work" , "log_ts_form" , "log_ts_to" , "log_ts_total_time" , "log_ts_woek" ,
         "log_ts_status" , "log_ts_date" , "log_created_at" , "log_updated_at" ,
    ];
}
