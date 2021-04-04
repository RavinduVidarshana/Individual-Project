<?php

namespace App\Http\Controllers\WelfareSociety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileUpdateController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Welfare Society Profile',

        ];
        return view('wsProfile',['response'=>$res]);
    }
}
