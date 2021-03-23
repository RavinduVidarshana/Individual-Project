<?php

namespace App\Http\Controllers\Admin;

use App\ExtraData\DefaultData;
use App\Model\User;
use App\Model\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $U = User::join('user_login','user_login.user_id','=','user.id')
            ->select('user.id as id','user.fullName','user_login.userName','user_login.password')
            ->get();

        return response()->json(["message" => "Success","response "=>$U], 200);
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
            'fullName' => 'required|min:2|max:145',
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $fullName = $request->fullName;
            $userName = $request ->userName;
            $password = $request ->password;
            $user_role_id = DefaultData::$USER_ROLE_ADMIN;

            $UL=UserLogin::where('userName',$userName)->first();
            if($UL){
                return response()->json(["message" => "Username already used"], 400);
            }else {

                $U = new User();
                $U->fullName = $fullName;
                $U->save();

                $UL = new UserLogin();
                $UL->userName = $userName;
                $UL->password = $password;
                $UL->user_role_id = $user_role_id;
                $UL->user_id = $U->id;
                $UL->save();


                return response()->json(["message" => "Successfully Insert User"], 200);
            }
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
        $U = User::join('user_login','user_login.user_id','=','user.id')
            ->where('user.id',$id)
            ->select('user.id as id','user.fullName','user_login.userName','user_login.password')
            ->first();

        return response()->json(["message" => "Success One","response "=>$U], 200);
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
        $rule = [
            'fullName' => 'required|min:2|max:145',
            'password' => 'required|min:8|max:345'

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $fullName = $request->fullName;
            $password = $request ->password;

                $U = User::find($id);
                $U->fullName = $fullName;
                $U->update();

                $UL = UserLogin::where('user_id',$U->id)->first();
                $UL->password = $password;
                $UL->update();


                return response()->json(["message" => "Successfully Update User"], 200);

        }
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
