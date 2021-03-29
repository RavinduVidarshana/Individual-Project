<?php

namespace App\Http\Controllers\Temple;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'News Manage',

        ];
        return view('templeNews',['response'=>$res]);
    }
}
