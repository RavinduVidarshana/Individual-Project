<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelfareSocManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Welfare Society Manage',

        ];
        return view('adminWelfareSociety',['response'=>$res]);
    }
}
