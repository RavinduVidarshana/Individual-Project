<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DaneScheduleManageController extends Controller
{

    public function index(Request $request){
        $path='DaneSchedule' ;
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
            'name' => 'Dane Schedule',
            'tableData' => $tableData,
        ];
        return view('templeDaneSchedule',['response'=>$res]);
    }


    public function find(Request $request,$id){
        $path='DaneSchedule/'.$id ;
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







    public function addDaneSchedule(Request $request)
    {
        $id = $request->id;
        $date = $request->daneDate;
        $dane_time_id =$request->daneTime;
        $monkCount = $request->monkCount;
        $vegMonkCount = $request->vegMonkCount;
        $nonVegMonkCount = $request->nonVegMonkCount;
        if (empty($date) || empty($dane_time_id) || empty($monkCount) || empty($vegMonkCount) || empty($nonVegMonkCount)) {
            return redirect('/templeDaneSchedule?msg=Please enter valid data');
        } else {
            $path = 'DaneSchedule';
            $method = 'POST';
            $jsonInputString = [
                'date' => $date,
                'dane_time_id' => $dane_time_id,
                'monkCount' => $monkCount,
                'vegMonkCount' => $vegMonkCount,
                'nonVegMonkCount' => $nonVegMonkCount,

                'temple_id' => session('userID'),
            ];
            $has_param = true;
            $session_key = session('session_Key');
            $has_session = true;

            $res = ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data = json_decode($res, true);
            $status = $res_data['status'];
            $message = $res_data['message'];
            return redirect('/templeDaneSchedule?msg=' . $message);
        }


    }



    public function updateDaneSchedule(Request $request)
    {
        $id = $request->id;
        $date = $request->updatedaneDate;
        $dane_time_id =$request->updatedaneTime;
        $monkCount = $request->updatemonkCount;
        $vegMonkCount = $request->updatevegMonkCount;
        $nonVegMonkCount = $request->updatenonVegMonkCount;
        if (empty($date) || empty($dane_time_id) || empty($monkCount) || empty($vegMonkCount) || empty($nonVegMonkCount)) {
            return redirect('/templeDaneSchedule?msg=Please enter valid data');
        } else {
            $path='DaneSchedule/'.$id ;
            $method='PUT';
            $jsonInputString =[
                'date' => $date,
                'dane_time_id' => $dane_time_id,
                'monkCount' => $monkCount,
                'vegMonkCount' => $vegMonkCount,
                'nonVegMonkCount' => $nonVegMonkCount,

                'temple_id' => session('userID'),
            ];
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeDaneSchedule?msg='.$message);
        }

    }

    public function deleteDaneSchedule(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            return redirect('/templeDaneSchedule?msg=Please enter valid data');
        } else {
            $path='DaneSchedule/'.$id ;
            $method='DELETE';
            $jsonInputString ='';
            $has_param=false;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeDaneSchedule?msg='.$message);
        }

    }

    }
