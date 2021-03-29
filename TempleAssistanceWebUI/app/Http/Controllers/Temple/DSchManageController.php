<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DSchManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dhamma School Manage',

        ];
        return view('templeDhammaSchool',['response'=>$res]);
    }
}
