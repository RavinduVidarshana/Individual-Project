<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUSManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'User Manage',

        ];
        return view('adminUsers',['response'=>$res]);
    }
}
