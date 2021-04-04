<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index(Request $request)
    {

        return view('userLogin');
    }

    public function userLogin(Request $request)
    {
        $username=$request->username;
        $password=$request->password;
        if(empty($username) || empty($username)){
            return redirect('/');
        }else{
            if($username=='Admin' && $password=='123'){
                return redirect('/adminDashboard');
            }elseif ($username=='User' && $password=='123') {
                return redirect('/templeDashboard');
            }elseif ($username=='Dhamma' && $password=='123'){
                return redirect('/dSchDashboard');
            }elseif ($username=='Welfare' && $password=='123'){
                return redirect('/wsDashboard');
            }else{
                return redirect('/');
            }
        }
    }
}
