<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class partnerModel extends Model
{
    protected $table = 'tb_partner';
    protected $fullable = [
        "pt_id" , "pt_name" , "created_at" , "updated_at" ,
    ];
}
