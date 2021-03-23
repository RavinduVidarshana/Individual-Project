<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InitController extends Controller
{
    public function index(Request $request){
        $res = [
            'name' => 'Ravindu',
            'age' => '24'
            ];
        return view('home',['response'=>$res]);
    }
}
