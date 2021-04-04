<?php

namespace App\Http\Controllers\DhammaSchool;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileUpdateController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dhamma School Profile',

        ];
        return view('dSchProfile',['response'=>$res]);
    }
}
