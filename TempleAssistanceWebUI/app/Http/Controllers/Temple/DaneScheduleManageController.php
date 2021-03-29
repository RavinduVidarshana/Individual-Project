<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaneScheduleManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dane Manage',

        ];
        return view('templeDaneSchedule',['response'=>$res]);
    }
}
