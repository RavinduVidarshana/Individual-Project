<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventManageController extends Controller
{
    public function index(Request $request){

        $path='TempleEvent' ;
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

        $path2='DataLoad' ;
        $method2='GET';
        $jsonInputString2 ='';
        $has_param2=false;
        $session_key2=session('session_Key');
        $has_session2=true;

        $res2=ApiCalling::makeRequest($path2, $method2, $jsonInputString2, $has_param2, $session_key2, $has_session2);
        $res_data2=json_decode($res2,true);
        $status2=$res_data2['status'];
        $eventCategories=$res_data2['response']['eventCategories'];


        $res = [
            'name' => 'Event Manage',
            'tableData' => $tableData,
            'eventCategories' => $eventCategories,
        ];
        return view('templeEventManage',['response'=>$res]);
    }


    public function find(Request $request,$id){
        $path='TempleEvent/'.$id ;
        $method='GET';
        $jsonInputString ='';
        $has_param=false;
        $session_key=session('session_Key');
        $has_session=true;

        $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
        $res_data=json_decode($res,true);
        $status=$res_data['status'];
        $responseData=$res_data['response'];

        return $responseData;
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
            return redirect('/templeEventManage?msg=Please enter valid data');
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

    public function updateEvent(Request $request)
    {
        $id = $request->id;

        $eventDateFrom = $request->upeventFromDate;
        $eventDateTo = $request->upeventEndDate;
        $eventStartTime = $request->updateeventStartTime;
        $eventEndTime = $request->updateeventEndTime;
        $eventCategory = $request->updateeventCategory;
        $eventName = $request->updateeventName;

        $eventInfo = $request->updateeventInfo;
        $eventPhone = $request->updateeventPhone;
        $longitude = $request->updateeventLongitude;
        $latitude = $request->updateeventLatitude;
        $eventStartDateTime = $eventDateFrom.' '.$eventStartTime.':00';
        $eventEndDateTime = $eventDateTo.' '.$eventEndTime.':00';


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
            return redirect('/templeEventManage?msg=Please enter valid data');
        } else {
            $path='TempleEvent/'.$id ;
            $method='PUT';
            $jsonInputString =[
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
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeEventManage?msg='.$message);
        }

    }

    public function deleteEvent(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            return redirect('/templeEventManage?msg=Please enter valid data');
        } else {
            $path='TempleEvent/'.$id ;
            $method='DELETE';
            $jsonInputString ='';
            $has_param=false;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeEventManage?msg='.$message);
        }

    }

}
