<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaneScheduleManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dane Schedule',

        ];
        return view('templeDaneSchedule',['response'=>$res]);
    }

    public function save(Request $request){
        $res = [
            'monkCount' => $request->monkCount,

        ];
        return view('templeDashboard',['response'=>$res]);


    }
}
