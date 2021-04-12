<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WSocManageController extends Controller
{
    public function index(Request $request){

        $path='WelfareSociety' ;
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
            'name' => 'Welfare Society Manage',
            'tableData' => $tableData,
        ];
        return view('templeWelfareSociety',['response'=>$res]);
    }



    public function find(Request $request,$id){

        $path='WelfareSociety/'.$id ;
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


    public function addWelfare(Request $request)
    {
        $welfareName = $request->welfareName;
        $welfareRegnum = $request->welfareRegnum;
        $welfareMemberCount = $request->welfareMemberCount;
        $welfarePresident = $request->welfarePresident;
        $welfareSecretary = $request->welfareSecretary;
        $welfareTreasure = $request->welfareTreasure;
        $userName = $request->userName;
        $password = $request->password;

        if (empty($welfareName) || empty($welfareRegnum) || empty($welfareMemberCount)|| empty($welfarePresident)|| empty($welfareSecretary)|| empty($welfareTreasure)|| empty($userName)|| empty($password)) {
            return redirect('/templeWelfareSociety?msg=Please enter valid data');
        } else {
            $path='WelfareSociety' ;
            $method='POST';
            $jsonInputString =[
                'welfareName' => $welfareName,
                'welfareRegnum' => $welfareRegnum,
                'welfareMemberCount' => $welfareMemberCount,
                'welfarePresident' => $welfarePresident,
                'welfareSecretary' => $welfareSecretary,
                'welfareTreasure' => $welfareTreasure,
                'userName' => $userName,
                'password' => $password,
                'temple_id' => session('userID'),
            ];
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeWelfareSociety?msg='.$message);
        }

    }


    public function updateWelfare(Request $request)
    {
        $id =$request ->id;
        $welfareName = $request->updatewelfareName;
        $welfareRegnum = $request->updatewelfareRegnum;
        $welfareMemberCount = $request->updatewelfareMemberCount;
        $welfarePresident = $request->updatewelfarePresident;
        $welfareSecretary = $request->updatewelfareSecretary;
        $welfareTreasure = $request->updatewelfareTreasure;
//        $userName = $request->userName;
//        $password = $request->password;

//        if (empty($welfareName) || empty($welfareRegnum) || empty($welfareMemberCount)|| empty($welfarePresident)|| empty($welfareSecretary)|| empty($welfareTreasure)|| empty($userName)|| empty($password)) {
//            return redirect('/templeWelfareSociety?msg=Please enter valid data');

        if (empty($welfareName) || empty($welfareRegnum) || empty($welfareMemberCount)|| empty($welfarePresident)|| empty($welfareSecretary)|| empty($welfareTreasure)) {
            return redirect('/templeWelfareSociety?msg=Please enter valid data');
        } else {
            $path='WelfareSociety/'.$id ;
            $method='PUT';
            $jsonInputString =[
                'welfareName' => $welfareName,
                'welfareRegnum' => $welfareRegnum,
                'welfareMemberCount' => $welfareMemberCount,
                'welfarePresident' => $welfarePresident,
                'welfareSecretary' => $welfareSecretary,
                'welfareTreasure' => $welfareTreasure,
//                'userName' => $userName,
//                'password' => $password,
                'temple_id' => session('userID'),
            ];
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeWelfareSociety?msg='.$message);
        }



    }
}

