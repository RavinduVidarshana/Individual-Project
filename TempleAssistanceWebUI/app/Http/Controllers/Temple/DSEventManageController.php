<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DSEventManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dhamma School Events',

        ];
        return view('templeDhammaEvent',['response'=>$res]);
    }
}
