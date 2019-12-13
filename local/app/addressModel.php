<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addressModel extends Model
{
    protected $table = 'tb_address_clients';
    protected $fullable = [
        "ct_ad_id" , "ct_ad" , "ct_ad_branch" , "ct_ad_road" , "ct_ad_subarea" ,
        "ct_ad_area" , "ct_ad_province" , "ct_ad_code" , "ct_ad_country" , "ct_ad_phone" ,
        "ct_ad_fax" , "ct_ad_mail" , "ct_ad_atten" , "ct_ad_invoice" , "ct_ad_ref" ,
        "created_at" , "updated_at" ,
    ];
}
