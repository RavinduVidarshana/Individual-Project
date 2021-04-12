<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
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

//    public function save(Request $request){
//        $res = [
//            'monkCount' => $request->monkCount,
//
//        ];
//        return view('templeDashboard',['response'=>$res]);
//
//
//    }
    public function addDaneSchedule(Request $request)
    {
        $date = $request->date;
        $dane_time_id =$request->dane_time_id;
        $monkCount = $request->monkCount;
        $vegMonkCount = $request->vegMonkCount;
        $nonVegMonkCount = $request->nonVegMonkCount;
        if (empty($date) || empty($dane_time_id) || empty($monkCount) || empty($vegMonkCount) || empty($nonVegMonkCount)) {
            return redirect('/templeDaneSchedule?msg=Please enter valid data');
        } else {
            $path = 'News';
            $method = 'POST';
            $jsonInputString = [
                'date' => $date,
                'dane_time_id' => $dane_time_id,
                'monkCount' => $monkCount,
                'vegMonkCount' => $vegMonkCount,
                'nonVegMonkCount' => $nonVegMonkCount,

                //'temple_id' => session('userID'),
            ];
            $has_param = true;
            $session_key = session('session_Key');
            $has_session = true;

            $res = ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data = json_decode($res, true);
            $status = $res_data['status'];
            $message = $res_data['message'];
            return redirect('//templeDaneSchedule?msg=' . $message);
        }


    }


    }
