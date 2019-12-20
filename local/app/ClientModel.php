<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'tb_clients';
    protected $fullable = [
        "id_ct" , "ct_no" , "ct_fn" , "ct_inn" , "ct_tax" , "ct_country" , "ct_ad_ref" , "ct_images" , "created_at" , "updated_at" ,
    ];
}
