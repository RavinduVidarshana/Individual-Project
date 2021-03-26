<?php

namespace App\Http\Controllers\Manage;

use App\Model\Welfare;
use App\Model\WelfareHasAddress;
use App\Model\WelfareHasEmail;
use App\Model\WelfareHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WelfareSocietyManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $WS = Welfare::join('temple','welfare.temple_id','=','temple.id')
            ->select('welfare.id as id','welfare.welfareName','welfare.welfareRegnum','welfare.welfareMemberCount','welfare.welfarePresident','welfare.welfareSecretary','welfare.welfareTreasure','temple.id as temple_id','temple.templeName')
            ->get();

        // $BF = BuddhistFollowers::get();

        $WSARY=array();
        foreach ($WS as $item){


            $WSHA = WelfareHasAddress::join('address','welfare_has_address.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->join('district','city.district_id','=','district.id')
                ->join('province','district.province_id','=','province.id')
                ->where('welfare_has_address.id','=',$item->id)
                ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
                ->first();

            $WSHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id','=','phone.id')
                ->where('welfare_has_phone.welfare_id','=',$item->id)
                ->select('phone.id as id','phone.phoneName','phone.isPrimary','welfare_has_phone.id as temporaryPhoneId')
                ->get();

            $WSHE = WelfareHasEmail::join('email','welfare_has_email.email_id','=','email.id')
                ->where('welfare_has_email.email_id','=',$item->id)
                ->select('email.id as id','email.emailName','email.isPrimary','welfare_has_email.id as temporaryEmailId')
                ->get();

            $res = [
                'id' =>$item ->id,
                'welfareName'=>$item->welfareName,
                'welfareRegnum'=>$item->welfareRegnum,
                'welfareMemberCount'=>$item->welfareMemberCount,
                'welfarePresident'=>$item->welfarePresident,
                'welfareSecretary'=>$item->welfareSecretary,
                'welfareTreasure'=>$item->welfareTreasure,

                'temple_id'=>$item->temple_id,
                'templeName'=>$item->templeName,

                'WSHA'=>$WSHA,
                'WSHP'=>$WSHP,
                'WSHE' => $WSHE

            ];

            array_push($WSARY,$res);
        }

        return response()->json(["message" => "Success","response "=>$WSARY], 200);
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
        $WS = Welfare::join('temple','welfare.temple_id','=','temple.id')
            ->select('welfare.id as id','welfare.welfareName','welfare.welfareRegnum','welfare.welfareMemberCount','welfare.welfarePresident','welfare.welfareSecretary','welfare.welfareTreasure','temple.id as temple_id','temple.templeName')
            ->first();

        $WSHA = WelfareHasAddress::join('address','welfare_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('welfare_has_address.id','=',$id)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->first();

        $WSHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id','=','phone.id')
            ->where('welfare_has_phone.welfare_id','=',$id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','welfare_has_phone.id as temporaryPhoneId')
            ->get();

        $WSHE = WelfareHasEmail::join('email','welfare_has_email.email_id','=','email.id')
            ->where('welfare_has_email.email_id','=',$id)
            ->select('email.id as id','email.emailName','email.isPrimary','welfare_has_email.id as temporaryEmailId')
            ->get();
        $res = [
            'id' =>$WS ->id,
            'welfareName'=>$WS ->welfareName,
            'welfareRegnum'=>$WS ->welfareRegnum,
            'welfareMemberCount'=>$WS ->welfareMemberCount,
            'welfarePresident'=>$WS ->welfarePresident,
            'welfareSecretary'=>$WS ->welfareSecretary,
            'welfareTreasure'=>$WS ->welfareTreasure,

            'temple_id'=>$WS ->temple_id,
            'templeName'=>$WS ->templeName,

            'WSHA'=>$WSHA,
            'WSHP'=>$WSHP,
            'WSHE' => $WSHE

        ];
        return response()->json(["message" => "Success","response "=>$res], 200);
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
        $WS = Welfare::find($id);
        $WS->update();

        return response()->json(["message" => "Status changed","response "=>$WS ], 200);
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
