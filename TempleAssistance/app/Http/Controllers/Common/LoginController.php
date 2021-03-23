<?php

namespace App\Http\Controllers\Common;

use App\ExtraData\DefaultData;
use App\Model\UserLogin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Claims\Expiration;
use Tymon\JWTAuth\Claims\IssuedAt;
use Tymon\JWTAuth\Claims\Issuer;
use Tymon\JWTAuth\Claims\JwtId;
use Tymon\JWTAuth\Claims\NotBefore;
use Tymon\JWTAuth\Claims\Subject;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Facades\JWTFactory;
use Validator;

class LoginController extends Controller
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        } else {
            $userName = $request->userName;
            $password = $request->password;
            $UL = UserLogin::where('userName', $userName)
                ->where('password', $password)
                ->first();
            if ($UL) {

                $UserID = 0;
                if ($UL->user_role_id == DefaultData::$USER_ROLE_ADMIN) {
                    $UserID = $UL->user_id;
                } else if ($UL->user_role_id == DefaultData::$USER_ROLE_TEMPLE_MAIN_MONK) {
                    $UserID = $UL->temple_id;
                }else if ($UL->user_role_id == DefaultData::$USER_ROLE_WELFARE_SOCIETY_PRESIDENT) {
                    $UserID = $UL->welfare_id;
                }else if ($UL->user_role_id == DefaultData::$USER_ROLE_DHAMMA_SCHOOL_PRINCIPLE) {
                    $UserID = $UL->dhamma_school_id;
                }else if ($UL->user_role_id == DefaultData::$USER_ROLE_BUDDHIST_FOLLOWERS) {
                    $UserID = $UL->buddhist_followers_id;
                }

                $Factory = JWTFactory::customClaims([
                    'userID' => $UserID,
                    'loginID' => $UL->id,
                    'userRoleID' => $UL->user_role_id,
                    'iss' => new Issuer('Temple Assistance'),
                    'iat' => new IssuedAt(Carbon::now('UTC')),
                    'exp' => new Expiration(Carbon::now('UTC')->addDays(3)),
                    'nbf' => new NotBefore(Carbon::now('UTC')),
                    'sub' => new Subject('Test App'),
                    'jti' => new JwtId("APP542141"),
                ]);

                $payLoad = $Factory->make();
                $session_Key = JWTAuth::encode($payLoad);

                return response()->json(["message" => "Successfully Insert UserLogin", "Session_key" => $session_Key->get()], 200);

            } else {
                return response()->json(["Message" => "User Name Password Not Mach"], 400);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
