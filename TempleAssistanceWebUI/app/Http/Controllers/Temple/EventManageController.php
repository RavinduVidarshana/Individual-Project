<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventManageController extends Controller
{
    public function index(Request $request){

        $path='News' ;
        $method='GET';
        $jsonInputString ='';
        $has_param=false;
        $session_key=session('session_Key');
        $has_session=true;

        $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
        $res_data=json_decode($res,true);
        $status=$res_data['status'];
        $tableData=$res_data['response'];
        if($tableData==''){
            $tableData=array();
        }

        $res = [
            'name' => 'Event Manage',
        ];
        return view('templeEventManage',['response'=>$res]);
    }


    public function addEvent(Request $request)
    {
        $eventName = $request->eventName;
        $eventInfo = $request->eventInfo;
        $eventDateFrom = $request->eventFromDate;
        $eventDateTo = $request->eventEndDate;
        $eventStartTime = $request->eventStartTime;
        $eventEndTime = $request->eventEndTime;
        $eventStartDateTime = $eventDateFrom.' '.$eventStartTime.':00';
        $eventEndDateTime = $eventDateTo.' '.$eventEndTime.':00';
        $longitude = $request->eventLongitude;
        $latitude = $request->eventLatitude;
        $eventPhone = $request->eventPhone;

        $eventCategory = $request->eventCategory;

//        $eventStartDateTime=date('Y-m-d H:i:s', $eventStartDateTime);
//        $eventEndDateTime=date('Y-m-d H:i:s', $eventEndDateTime);

//        echo $eventEndDateTime;


        if (empty($eventName)
            || empty($eventInfo)
            || empty($eventDateFrom)
            || empty($eventDateTo)
            || empty($eventStartTime)
            || empty($eventEndTime)
            || empty($longitude)
            || empty($latitude)
            || empty($eventPhone)
            || empty($eventCategory)) {
            return redirect('/templeEventManage?msg=Please enter valid data122');
        } else {
            $path = 'TempleEvent';
            $method = 'POST';
            $jsonInputString = [
                'eventName' => $eventName,
                'eventInfo' => $eventInfo,
                'eventDateFrom' => $eventStartDateTime,
                'eventDateTo' => $eventEndDateTime,
                'longitude' => $longitude,
                'latitude' => $latitude,
                'event_catergory_id' => $eventCategory,
                'phone_number' => $eventPhone,
                'temple_id' => session('userID'),
            ];
            $has_param = true;
            $session_key = session('session_Key');
            $has_session = true;

            $res = ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data = json_decode($res, true);
            $status = $res_data['status'];
            $message = $res_data['message'];
            return redirect('/templeEventManage?msg=' . $message);
        }
    }



}
