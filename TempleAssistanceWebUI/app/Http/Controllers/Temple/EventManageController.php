<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Event Manage',

        ];
        return view('templeEventManage',['response'=>$res]);
    }
}
