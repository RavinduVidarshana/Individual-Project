<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempleManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Temple Manage',

        ];
        return view('adminTemple',['response'=>$res]);
    }
}
