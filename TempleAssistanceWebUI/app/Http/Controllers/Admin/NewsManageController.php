<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsManageController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'News Manage',

        ];
        return view('adminNews',['response'=>$res]);
    }
}
