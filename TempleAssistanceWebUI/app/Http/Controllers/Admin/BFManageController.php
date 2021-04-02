<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BFManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Buddhist Followers Manage',

        ];
        return view('adminBuddhistFollowers',['response'=>$res]);
    }
}
