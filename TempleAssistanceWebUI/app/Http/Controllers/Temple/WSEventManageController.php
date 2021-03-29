<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WSEventManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Welfare Society Events',

        ];
        return view('templeWelfareEvent',['response'=>$res]);
    }
}
