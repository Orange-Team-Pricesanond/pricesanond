<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class yellowfileModel extends Model
{
    protected $table = 'tb_yellowfiles';
    protected $fullable = [
        "id_yf" , "id_ct_yf" , "yf_fileno" , "yf_mtt" , "yf_partner", "yt_group" , "yf_currency" , "yf_currencyter" , "yf_fixfee" ,
         "yf_fixfee_month" , "yf_estimate" , "yf_discount" , "yf_vat" , "yf_time" , "yf_rates_a" , "yf_rates_b", "yf_rates_c",
         "yf_rates_d", "yf_rates_e", "yf_rates_f", "yf_taxnumber", "yf_inv_num", "yf_address" , "yf_road", "yf_dis" ,
         "yf_subdis", "yf_provice", "yf_code", "yf_rates_a", "yf_country", "yf_phone", "yf_fax" , "yf_email", "yf_atten" ,
         "yf_invioctext", "yf_location", "yf_refer", "yf_confict", "yf_team" , "yf_bothcurrency" ,"created_at", "updated_at",
         "yf_annual_fee" ,

    ];
}
