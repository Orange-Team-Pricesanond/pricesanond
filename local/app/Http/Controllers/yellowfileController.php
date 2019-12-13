<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\yellowfileModel;
use DB;
use Image;

class yellowfileController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }
    public function index(){
        $yellow = yellowfileModel::all();
        return view('yellowfile', [
            'yellowfile' => $yellow
        ]);
    }
}
