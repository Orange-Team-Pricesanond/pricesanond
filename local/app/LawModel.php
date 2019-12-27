<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LawModel extends Model
{
    protected $table = 'tb_law';
    protected $fullable = [
        "law_id" , "lw_name" , "lw_yf_rates" ,
    ];
}
