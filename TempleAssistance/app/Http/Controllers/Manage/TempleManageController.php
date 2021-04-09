<?php

namespace App\Http\Controllers\Manage;

use App\Model\Temple;
use App\Model\TempleHasAddress;
use App\Model\TempleHasEmail;
use App\Model\TempleHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TempleManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $TMP = Temple::join('temple_category','temple.temple_category_id','=','temple_category.id')
            ->select('temple.id as id','temple.templeName','temple.templeInfo','temple.mainMonk','temple.longitude','temple.longitude','temple.latitude','temple.monkCount','temple.vegMonkCount','temple.nonVegMonkCount','temple_category.id as templeCategoryId','temple_category.templeCategoryName')
            ->get();


        $TMPARY=array();
        foreach ($TMP as $item){
            $TMHA = TempleHasAddress::join('address','temple_has_address.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->join('district','city.district_id','=','district.id')
                ->join('province','district.province_id','=','province.id')
                ->where('temple_has_address.temple_id','=',$item->id)
                ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
                ->get();

            $TMHP = TempleHasPhone::join('phone','temple_has_phone.phone_id','=','phone.id')
                ->where('temple_has_phone.temple_id','=',$item->id)
                ->select('phone.id as id','phone.phoneName','phone.isPrimary','temple_has_phone.id as tempPhoneId')
                ->get();


            $TMHE = TempleHasEmail::join('email','temple_has_email.email_id','=','email.id')
                ->where('temple_has_email.email_id','=',$item->id)
                ->select('email.id as id','email.emailName','email.isPrimary','temple_has_email.id as temporaryEmailId')
                ->get();
            $res = [
                'id' =>$item ->id,
                'templeName'=>$item->templeName,
                'templeInfo'=>$item->templeInfo,
                'mainMonk'=>$item->mainMonk,
                'longitude'=>$item->longitude,
                'latitude'=>$item->latitude,
                'monkCount'=>$item->monkCount,
                'vegMonkCount'=>$item->vegMonkCount,
                'nonVegMonkCount'=>$item->nonVegMonkCount,
                'TMHA'=>$TMHA,
                'TMHP'=>$TMHP,
                'TMHE' => $TMHE

            ];

            array_push($TMPARY,$res);
        }

        $JsonRes=[
            "message" => "Success",
            "status" => 200,
            "response" => $TMPARY,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message" => "Success","response "=>$TMPARY], 200);
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
        $TMP = Temple::join('temple_category','temple.temple_category_id','=','temple_category.id')
            -> where('temple.id','=',$id)
            ->select('temple.id as id','temple.templeName','temple.templeInfo','temple.mainMonk','temple.longitude','temple.longitude','temple.latitude','temple.monkCount','temple.vegMonkCount','temple.nonVegMonkCount','temple_category.id as templeCategoryId','temple_category.templeCategoryName')
            ->first();


        $TMHA = TempleHasAddress::join('address','temple_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('temple_has_address.temple_id','=',$id)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $TMHP = TempleHasPhone::join('phone','temple_has_phone.phone_id','=','phone.id')
            ->where('temple_has_phone.temple_id','=',$id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','temple_has_phone.id as tempPhoneId')
            ->get();


        $TMHE = TempleHasEmail::join('email','temple_has_email.email_id','=','email.id')
            ->where('temple_has_email.email_id','=',$id)
            ->select('email.id as id','email.emailName','email.isPrimary','temple_has_email.id as temporaryEmailId')
            ->get();

        $res=[
            'id' =>$TMP ->id,
            'templeName'=>$TMP->templeName,
            'templeInfo'=>$TMP->templeInfo,
            'mainMonk'=>$TMP->mainMonk,
            'longitude'=>$TMP->longitude,
            'latitude'=>$TMP->latitude,
            'monkCount'=>$TMP->monkCount,
            'vegMonkCount'=>$TMP->vegMonkCount,
            'nonVegMonkCount'=>$TMP->nonVegMonkCount,

            'TMHA'=>$TMHA,
            'TMHP'=>$TMHP,
            'TMHE' => $TMHE

        ];

        $JsonRes=[
            "message" => "Success",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "One Temple" ,"response" => $res], 200);
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
        $TMP = Temple::find($id);
        $approved_status=$TMP->isApproved;
        $TMP->isApproved=!$approved_status;
        $TMP->update();

        $JsonRes=[
            "message" => "Status changed",
            "status" => 200,
            "response" => "",
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message" => "Status changed" ], 200);
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
