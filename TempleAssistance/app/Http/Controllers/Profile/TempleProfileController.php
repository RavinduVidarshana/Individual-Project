<?php

namespace App\Http\Controllers\Profile;


use App\Http\Helpers\JwtDecoderHelper;
use App\Model\Temple;
use App\Model\TempleHasAddress;
use app\Model\TempleHasEmail;
use App\Model\TempleHasPhone;
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
    public function show($id,Request $request)
    {
        $SESSION_KEY_TOKEN = $request->header('Session-Key');
        $userid = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];

        $TMP = Temple::join('temple_category','temple.temple_category_id','=','temple_category.id')
            -> where('temple.id','=',$userid)
            ->select('temple.id as id','temple.templeName','temple.templeInfo','temple.mainMonk','temple.longitude','temple.longitude','temple.latitude','temple.monkCount','temple.vegMonkCount','temple.nonVegMonkCount','temple_category.id as templeCategoryId','temple_category.templeCategoryName')
            ->first();


        $TMHA = TempleHasAddress::join('address','temple_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('temple_has_address.temple_id','=',$userid)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $TMHP = TempleHasPhone::join('phone','temple_has_phone.phone_id','=','phone.id')
            ->where('temple_has_phone.temple_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','temple_has_phone.id as tempPhoneId')
            ->get();


        $TMHE = TempleHasEmail::join('email','temple_has_email.email_id','=','email.id')
            ->where('temple_has_email.email_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','temple_has_email.id as temporaryEmailId')
            ->get();

        $res=[
            'id'=>$TMP->id,
            'templeName'=>$TMP->templeName,
            'TMHA'=>$TMHA,
            'TMHP'=>$TMHP,
            'TMHE' => $TMHE

        ];
        $JsonRes=[
            "message" => "Find one One Temple",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);
//             return response()->json(["message" => "One Temple" ,"response" => $res], 200);

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

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $SESSION_KEY_TOKEN = $request->header('Session-Key');
            $userid = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];


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


            $TM = Temple::find($userid);
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

            $JsonRes=[
                "message" => "Successfully update Temple",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message" => "Successfully update Temple"], 200);
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
