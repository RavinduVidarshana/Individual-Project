<?php

namespace App\Http\Controllers\Common;

use App\ExtraData\DefaultData;
use App\Model\BuddhistFollowers;
use App\Model\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class BFRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'firstName' => 'required|min:2|max:45',
            'lastName' =>'required|min:2|max:45',
            'NIC' => 'required|min:2|max:15',
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $NIC = $request->NIC;
            $isApproved = false;
            $userName = $request ->userName;
            $password = $request ->password;
            $user_role_id = DefaultData::$USER_ROLE_BUDDHIST_FOLLOWERS;


            $BF = new BuddhistFollowers();
            $BF->firstName = $firstName;
            $BF->lastName = $lastName;
            $BF->NIC  = $NIC ;
            $BF->isApproved = $isApproved;
            $BF->save();

            $UL = new UserLogin();
            $UL-> userName = $userName;
            $UL -> password = $password;
            $UL -> user_role_id = $user_role_id;
            $UL ->buddhist_followers_id = $BF -> id;
            $UL ->save();


            return response()->json(["message" => "Successfully Insert Buddhist Followers"], 200);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
