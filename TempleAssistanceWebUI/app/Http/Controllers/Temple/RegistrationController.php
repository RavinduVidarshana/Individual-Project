<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegistrationController extends Controller
{
    public function index(Request $request)
    {     $res = [
        'name' => 'Temple Registration',

    ];
        return view('templeRegistration',['response'=>$res]);

    }
}
