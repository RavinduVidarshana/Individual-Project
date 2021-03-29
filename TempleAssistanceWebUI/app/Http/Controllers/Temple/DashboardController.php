<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Dashboard',

        ];
        return view('templeDashboard',['response'=>$res]);
    }
}
