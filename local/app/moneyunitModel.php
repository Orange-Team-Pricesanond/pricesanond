<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moneyunitModel extends Model
{
    protected $table = 'tb_money_unit';
    protected $fullable = [
        "id_mu" , "mu_name" , "created_at" , "updated_at" ,
    ];
}
