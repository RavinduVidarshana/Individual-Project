<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileUpdateController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Temple Profile',

        ];
        return view('templeProfile',['response'=>$res]);
    }
}
