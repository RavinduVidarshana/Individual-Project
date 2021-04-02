<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DhammaSchManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dhamma School Manage',

        ];
        return view('adminDhammaSchool',['response'=>$res]);
    }
}
