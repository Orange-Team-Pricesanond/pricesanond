<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientModel extends Model
{
    protected $table = 'tb_clients';
    protected $fullable = [
        "ct_fn" , "ct_inn" , "ct_tax" , "ct_images" ,
    ];
}
