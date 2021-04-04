<?php

namespace App\Http\Controllers\WelfareSociety;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Event Manage',

        ];
        return view('wsEvent',['response'=>$res]);
    }
}
