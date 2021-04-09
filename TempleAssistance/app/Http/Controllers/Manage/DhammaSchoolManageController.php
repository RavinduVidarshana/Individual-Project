<?php

namespace App\Http\Controllers\Manage;

use App\Model\DhammaSchool;
use App\Model\DhammaSchoolHasAddress;
use App\Model\DhammaSchoolHasEmail;
use App\Model\DhammaSchoolHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DhammaSchoolManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DM = DhammaSchool::join('temple','dhamma_school.temple_id','=','temple.id')
            ->select('dhamma_school.id as id','dhamma_school.dhammaSchoolName','dhamma_school.dhammaSchoolRegnum','dhamma_school.dhammaSchoolPrinciple','dhamma_school.StudentCount','temple.id as temple_id','temple.templeName')
            ->get();

        // $BF = BuddhistFollowers::get();

        $DMARY=array();
        foreach ($DM as $item){


            $DMHA = DhammaSchoolHasAddress::join('address','dhamma_school_has_address.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->join('district','city.district_id','=','district.id')
                ->join('province','district.province_id','=','province.id')
                ->where('dhamma_school_has_address.dhamma_school_id','=',$item->id)
                ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
                ->get();

            $DMHP = DhammaSchoolHasPhone::join('phone','dhamma_school_has_phone.phone_id','=','phone.id')
                ->where('dhamma_school_has_phone.dhamma_school_id','=',$item->id)
                ->select('phone.id as id','phone.phoneName','phone.isPrimary','dhamma_school_has_phone.id as temporaryPhoneId')
                ->get();


            $DMHE = DhammaSchoolHasEmail::join('email','dhamma_school_has_email.email_id','=','email.id')
                ->where('dhamma_school_has_email.email_id','=',$item->id)
                ->select('email.id as id','email.emailName','email.isPrimary','dhamma_school_has_email.id as temporaryEmailId')
                ->get();

            $res = [
                'id' =>$item ->id,
                'dhammaSchoolName'=>$item->dhammaSchoolName,
                'dhammaSchoolRegnum'=>$item->dhammaSchoolRegnum,
                'dhammaSchoolPrinciple'=>$item->dhammaSchoolPrinciple,
                'StudentCount'=>$item->StudentCount,

                'temple_id'=>$item->temple_id,
                'templeName'=>$item->templeName,

                'DMHA'=>$DMHA,
                'DMHP'=>$DMHP,
                'DMHE' => $DMHE

            ];

            array_push($DMARY,$res);
        }
        $JsonRes=[
            "message" => "Success",
            "status" => 200,
            "response" => $DMARY,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "Success","response "=>$DMARY], 200);
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
        $DM = DhammaSchool::join('temple','dhamma_school.temple_id','=','temple.id')
            ->select('dhamma_school.id as id','dhamma_school.dhammaSchoolName','dhamma_school.dhammaSchoolRegnum','dhamma_school.dhammaSchoolPrinciple','dhamma_school.StudentCount','temple.id as temple_id','temple.templeName')
            ->first();

        $DMHA = DhammaSchoolHasAddress::join('address','dhamma_school_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('dhamma_school_has_address.dhamma_school_id','=',$id)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $DMHP = DhammaSchoolHasPhone::join('phone','dhamma_school_has_phone.phone_id','=','phone.id')
            ->where('dhamma_school_has_phone.dhamma_school_id','=',$id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','dhamma_school_has_phone.id as temporaryPhoneId')
            ->get();


        $DMHE = DhammaSchoolHasEmail::join('email','dhamma_school_has_email.email_id','=','email.id')
            ->where('dhamma_school_has_email.email_id','=',$id)
            ->select('email.id as id','email.emailName','email.isPrimary','dhamma_school_has_email.id as temporaryEmailId')
            ->get();
        $res = [
            'id' =>$DM ->id,
            'dhammaSchoolName'=>$DM ->dhammaSchoolName,
            'dhammaSchoolRegnum'=>$DM ->dhammaSchoolRegnum,
            'dhammaSchoolPrinciple'=>$DM ->dhammaSchoolPrinciple,
            'StudentCount'=>$DM ->StudentCount,

            'temple_id'=>$DM ->temple_id,
            'templeName'=>$DM ->templeName,

            'DMHA'=>$DMHA,
            'DMHP'=>$DMHP,
            'DMHE' => $DMHE

        ];

        $JsonRes=[
            "message" => "Success",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "Success","response "=>$res], 200);
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
        $DM = DhammaSchool::find($id);
        $DM->update();

        $JsonRes=[
            "message" => "Status changed",
            "status" => 200,
            "response" => $DM,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "Status changed","response "=>$DM ], 200);
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
