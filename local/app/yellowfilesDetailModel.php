<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class yellowfilesDetailModel extends Model
{
    protected $table = 'tb_yellowfiles_detail';
    protected $fullable = [
        "id_yf_dt" , "id_yf" , "yfd_rates_a" , "yfd_rates_b" , "yfd_rates_c", "yfd_rates_d" , "yfd_rates_e" , "yfd_rates_f" , "yfd_style" , "yfd_setdate" , "yfd_update" , "yfd_create" ,
    ];
}
