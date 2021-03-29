<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WSocManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Welfare Society Manage',

        ];
        return view('templeWelfareSociety',['response'=>$res]);
    }
}
