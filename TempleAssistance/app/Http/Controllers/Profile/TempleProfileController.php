<?php

namespace App\Http\Controllers\Profile;

use App\ExtraData\DefaultData;
use App\Model\Temple;
use App\Model\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class TempleProfileController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $DS = DhammaSchool::find($id);
        $DSHP = DhammaSchoolHasPhone::join('phone','dhamma_school_has_phone.phone_id','=','phone.id')
            ->select('phone.id as id','phone.phoneName','phone.isPrimary')
            ->get();

        $DSHE = DhammaSchoolHasEmail::join('email','dhamma_school_has_email.email_id','=','email.id')
            ->select('email.id as id','email.emailName','email.isPrimary')
            ->get();

        $DSHA = DhammaSchoolHasAddress::join('address','dhamma_school_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $res = [
            'dshp' => $DSHP,
            'dshe' => $DSHE,
            'dsha' => $DSHA,
            "dhammaSchoolName" => $DS->dhammaSchoolName,
            "dhammaSchoolRegnum" => $DS->dhammaSchoolRegnum,
            "dhammaSchoolPrinciple" => $DS->dhammaSchoolPrinciple,
            "studentCount" => $DS->studentCount,
            "temple_id" => $DS->temple_id,

        ];

        return response()->json(["message"=>"Find one Dhamma School","response"=>$res],200);

        return response()->json(["message" => "Find one Dane Schedule", "response" => $res], 200);
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
            'templeName' => 'required|min:2|max:145',
            'templeInfo' =>'required|min:2|max:345',
            'mainMonk' => 'required|min:2|max:100',
            'monkCount' => 'required|min:1|numeric',
            'vegMonkCount' => 'required|numeric',
            'nonVegMonkCount' => 'required|numeric',
            'longitude' => 'required',
            'latitude' => 'required',
            'temple_category_id' => 'required|numeric',
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $templeName = $request->templeName;
            $templeInfo = $request->templeInfo;
            $mainMonk = $request->mainMonk;
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $monkCount = $request->monkCount;
            $vegMonkCount = $request->vegMonkCount;
            $nonVegMonkCount = $request->nonVegMonkCount;
            $temple_category_id = $request->temple_category_id;
            $isApproved = false;
            $userName = $request ->userName;
            $password = $request ->password;
            $user_role_id = DefaultData::$USER_ROLE_TEMPLE_MAIN_MONK;


            $TM = new Temple();
            $TM->templeName = $templeName;
            $TM->templeInfo = $templeInfo;
            $TM->mainMonk = $mainMonk;
            $TM->longitude = $longitude;
            $TM->latitude = $latitude;
            $TM->monkCount = $monkCount;
            $TM->vegMonkCount = $vegMonkCount;
            $TM->nonVegMonkCount = $nonVegMonkCount;
            $TM->temple_category_id = $temple_category_id;
            $TM->isApproved = $isApproved;
            $TM->update();

            $UL = new UserLogin();
            $UL-> userName = $userName;
            $UL -> password = $password;
            $UL -> user_role_id = $user_role_id;
            $UL -> temple_id = $TM -> id;
            $UL ->update();


            return response()->json(["message" => "Successfully update Temple"], 200);
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
