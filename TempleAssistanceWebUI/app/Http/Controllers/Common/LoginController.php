<?php

namespace App\Http\Controllers\Common;

use App\ApiHandling\ApiCalling;
use App\ExtraData\DefaultData;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7;
use GuzzleHttp\Exception\ClientException;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        return view('userLogin');
    }

    public function userLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        if (empty($username) || empty($username)) {
            return redirect('/?msg=Password or username empty');
        } else {

            $path='Login' ;
            $method='POST';
            $jsonInputString =[
                'userName' => $username,
                'password' => $password,
            ];
            $has_param=true;
            $session_key='';
            $has_session=false;

            $res=ApiCalling::makeRequest($path, $method, $jsonInputString, $has_param, $session_key, $has_session);

            $res_data=json_decode($res,true);
            $status=$res_data['status'];
            $message=$res_data['message'];
            if($status==200){
                $session_Key=$res_data['response']['session_Key'];
                $userRoleID=$res_data['response']['userRoleID'];
                $userID=$res_data['response']['userID'];
                $loggedUserRole=$res_data['response']['loggedUserRole'];
                $loggedUser=$res_data['response']['loggedUser'];
                session()->regenerate();
                session([
                    'session_Key'=>$session_Key,
                    'userRoleID'=>$userRoleID,
                    'loggedUserRole'=>$loggedUserRole,
                    'loggedUser'=>$loggedUser,
                    'userID'=>$userID,
                ]);


                if($userRoleID==DefaultData::$USER_ROLE_ADMIN){
                    return redirect('/adminDashboard');
                }else if($userRoleID==DefaultData::$USER_ROLE_TEMPLE_MAIN_MONK){
                    return redirect('/templeDashboard');
                }else if($userRoleID==DefaultData::$USER_ROLE_WELFARE_SOCIETY_PRESIDENT){
                    return redirect('/wsDashboard');
                }else if($userRoleID==DefaultData::$USER_ROLE_DHAMMA_SCHOOL_PRINCIPLE){
                    return redirect('/dSchDashboard');
                }else if($userRoleID==DefaultData::$USER_ROLE_BUDDHIST_FOLLOWERS){
                    return redirect('/?msg=Access denied');
                }else{
                    return redirect('/?msg=Something went to wrong');
                }
            }else{
                return redirect('/?msg='.$message);
            }

//            echo $res_data['message'];
//            if($username=='Admin' && $password=='123'){
//                return redirect('/adminDashboard');
//            }elseif ($username=='User' && $password=='123') {
//                return redirect('/templeDashboard');
//            }elseif ($username=='Dhamma' && $password=='123'){
//                return redirect('/dSchDashboard');
//            }elseif ($username=='Welfare' && $password=='123'){
//                return redirect('/wsDashboard');
//            }else{
//                return redirect('/');
//            }
        }
    }
}
