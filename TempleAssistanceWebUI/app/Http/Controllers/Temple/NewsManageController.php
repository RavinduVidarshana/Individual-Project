<?php

namespace App\Http\Controllers\Temple;

use App\ApiHandling\ApiCalling;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsManageController extends Controller
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
            'name' => 'News Manage',
            'tableData' => $tableData,
        ];
        return view('templeNews',['response'=>$res]);
    }

    public function find(Request $request,$id){
        $path='News/'.$id ;
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



    public function addNews(Request $request)
    {
        $title = $request->title;
        $description = $request->description;
        if (empty($title) || empty($description)) {
            return redirect('/templeNews?msg=Please enter valid data');
        } else {
            $path='News' ;
            $method='POST';
            $jsonInputString =[
                'title' => $title,
                'description' => $description,
                'temple_id' => session('userID'),
            ];
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeNews?msg='.$message);
        }



    }


    public function updateNews(Request $request)
    {
        $id = $request->id;
        $title = $request->updateTitle;
        $description = $request->updateDescription;
        if (empty($id) || empty($title) || empty($description)) {
            return redirect('/templeNews?msg=Please enter valid data');
        } else {
            $path='News/'.$id ;
            $method='PUT';
            $jsonInputString =[
                'title' => $title,
                'description' => $description
            ];
            $has_param=true;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeNews?msg='.$message);
        }

    }

    public function deleteNews(Request $request)
    {
        $id = $request->id;
        if (empty($id)) {
            return redirect('/templeNews?msg=Please enter valid data');
        } else {
            $path='News/'.$id ;
            $method='DELETE';
            $jsonInputString ='';
            $has_param=false;
            $session_key=session('session_Key');
            $has_session=true;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);
            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            return redirect('/templeNews?msg='.$message);
        }

    }
}
