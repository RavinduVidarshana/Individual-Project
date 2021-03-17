<?php

namespace App\Http\Controllers;

use App\ExtraData\DefaultData;
use App\Model\Welfare;
use App\Model\UserLogin;
use App\Model\WelfareHasAddress;
use App\Model\WelfareHasEmail;
use App\Model\WelfareHasPhone;
use Illuminate\Http\Request;

use Validator;

class WelfareSocietyController extends Controller
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
            'welfareName' => 'required|min:5|max:45',
            'welfareRegnum' =>'required|min:1|max:15',
            'welfareMemberCount' => 'required|min:1|numeric',
            'welfarePresident' => 'required|min:1|max:45',
            'welfareSecretary' => 'required|min:1|max:45',
            'welfareTreasure' => 'required|min:1|max:45',
            'temple_id' => 'required|numeric',
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'



        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else{
            $welfareName = $request-> welfareName;
            $welfareRegnum = $request-> welfareRegnum;
            $welfareMemberCount = $request-> welfareMemberCount;
            $welfarePresident = $request-> welfarePresident;
            $welfareSecretary = $request-> welfareSecretary;
            $welfareTreasure = $request-> welfareTreasure;
            $temple_id = $request-> temple_id;
            $user_role_id = DefaultData::$USER_ROLE_WELFARE_SOCIETY_PRESIDENT;
            $userName = $request ->userName;
            $password = $request ->password;


            $WF = new Welfare();
            $WF -> welfareName = $welfareName;
            $WF -> welfareRegnum = $welfareRegnum;
            $WF -> welfareMemberCount = $welfareMemberCount;
            $WF -> welfarePresident = $welfarePresident;
            $WF -> welfareSecretary = $welfareSecretary;
            $WF -> welfareTreasure = $welfareTreasure;
            $WF -> temple_id = $temple_id;
            $WF -> save();

            $UL = new UserLogin();
            $UL-> userName = $userName;
            $UL -> password = $password;
            $UL -> user_role_id = $user_role_id;
            $UL -> welfare_id  = $WF -> id;
            $UL ->save();

            return response()->json(["message"=>"Successfully Insert Welfare Society"],200);
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
      $WF =Welfare::find($id);
      $WFHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id', '=' , 'phone_id')
          -> select('phone_id as id', 'phone.phoneName','phone.isPrimary')
          -> get();

      $WFHE = WelfareHasEmail::join('email','welfare_has_email.email_id', '=' , 'email_id')
          -> select('email_id as id', 'email.emailName','email.isPrimary')
          -> get();

      $WFHA = WelfareHasAddress::join('address','welfare_has_address.address_id','=','address.id')
          ->join('city','address.city_id','=','city.id')
          ->join('district','city.district_id','=','district.id')
          ->join('province','district.province_id','=','province.id')
          ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
          ->get();

        $res = [
            'wfhp' => $WFHP,
            'wfhe' => $WFHE,
            'wfha' => $WFHA,
            "welfareName" => $WF->welfareName,
            "welfareRegnum" => $WF->welfareRegnum,
            "welfareMemberCount" => $WF->welfareMemberCount,
            "welfarePresident" => $WF->welfarePresident,
            "welfareSecretary" => $WF->welfareSecretary,
            "welfareTreasure" => $WF->welfareTreasure,
            "temple_id" => $WF->temple_id,

        ];
        return response()->json(["message"=>"Find one Welfare Society","response"=>$res],200);

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
            'welfareName' => 'required|min:5|max:45',
            'welfareRegnum' =>'required|min:1|max:15',
            'welfareMemberCount' => 'required|min:1|numeric',
            'welfarePresident' => 'required|min:1|max:45',
            'welfareSecretary' => 'required|min:1|max:45',
            'welfareTreasure' => 'required|min:1|max:45',
            'temple_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else{
            $welfareName = $request-> welfareName;
            $welfareRegnum = $request-> welfareRegnum;
            $welfareMemberCount = $request-> welfareMemberCount;
            $welfarePresident = $request-> welfarePresident;
            $welfareSecretary = $request-> welfareSecretary;
            $welfareTreasure = $request-> welfareTreasure;
            $temple_id = $request-> temple_id;


            $WF = Welfare::find($id);
            $WF -> welfareName = $welfareName;
            $WF -> welfareRegnum = $welfareRegnum;
            $WF -> welfareMemberCount = $welfareMemberCount;
            $WF -> welfarePresident = $welfarePresident;
            $WF -> welfareSecretary = $welfareSecretary;
            $WF -> welfareTreasure = $welfareTreasure;
            $WF -> temple_id = $temple_id;
            $WF -> update();

            return response()->json(["message"=>"Successfully Update Welfare Society"],200);

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
