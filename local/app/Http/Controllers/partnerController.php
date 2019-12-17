<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\partnerModel;
use DB;
use Image;

class partnerController extends Controller
{
    public function index()
    {
        $partner = partnerModel::all();
        return view('yellow_file.index', [
            'partner' => $partner
        ]);
    }
}
