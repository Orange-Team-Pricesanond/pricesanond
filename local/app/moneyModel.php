<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class moneyModel extends Model
{
    protected $table = 'tb_money_unit';
    protected $fullable = [
        "id_mu" , "mu_name" ,
    ];
}
