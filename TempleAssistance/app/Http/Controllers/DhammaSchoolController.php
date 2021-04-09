<?php

namespace App\Http\Controllers;

use App\ExtraData\DefaultData;
use App\Model\DhammaSchool;
use App\Model\DhammaSchoolHasAddress;
use App\Model\DhammaSchoolHasEmail;
use App\Model\DhammaSchoolHasPhone;
use App\Model\UserLogin;
use Illuminate\Http\Request;

use Validator;
class DhammaSchoolController extends Controller
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
            'dhammaSchoolName' => 'required|min:5|max:45',
            'dhammaSchoolRegnum' =>'required|min:1|max:15',
            'dhammaSchoolPrinciple' => 'required|min:1|max:45',
            'studentCount' => 'required|min:1|numeric',
            'temple_id' => 'required|numeric',
            'userName' => 'required|min:5|max:45',
            'password' => 'required|min:8|max:345'


        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $dhammaSchoolName = $request->dhammaSchoolName;
            $dhammaSchoolRegnum = $request->dhammaSchoolRegnum;
            $dhammaSchoolPrinciple = $request->dhammaSchoolPrinciple;
            $studentCount = $request->studentCount;
            $temple_id = $request->temple_id;
            $user_role_id = DefaultData::$USER_ROLE_DHAMMA_SCHOOL_PRINCIPLE;
            $userName = $request ->userName;
            $password = $request ->password;


            $DS = new DhammaSchool();
            $DS->dhammaSchoolName = $dhammaSchoolName;
            $DS->dhammaSchoolRegnum = $dhammaSchoolRegnum;
            $DS->dhammaSchoolPrinciple = $dhammaSchoolPrinciple;
            $DS->studentCount = $studentCount;
            $DS->temple_id = $temple_id;
            $DS->save();

            $UL = new UserLogin();
            $UL-> userName = $userName;
            $UL -> password = $password;
            $UL -> user_role_id = $user_role_id;
            $UL -> dhamma_school_id  = $DS -> id;
            $UL ->save();

            $JsonRes=[
                "message" => "Successfully Insert Dhamma School",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message" => "Successfully Insert Dhamma School"], 200);
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
        $JsonRes=[
            "message" => "Find one Dhamma School",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Dhamma School","response"=>$res],200);
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
            'dhammaSchoolName' => 'required|min:5|max:45',
            'dhammaSchoolRegnum' =>'required|min:1|max:15',
            'dhammaSchoolPrinciple' => 'required|min:1|max:45',
            'studentCount' => 'required|min:1|numeric',
            'temple_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $dhammaSchoolName = $request->dhammaSchoolName;
            $dhammaSchoolRegnum = $request->dhammaSchoolRegnum;
            $dhammaSchoolPrinciple = $request->dhammaSchoolPrinciple;
            $studentCount = $request->studentCount;
            $temple_id = $request->temple_id;



            $DS =  DhammaSchool:: find($id);
            $DS->dhammaSchoolName = $dhammaSchoolName;
            $DS->dhammaSchoolRegnum = $dhammaSchoolRegnum;
            $DS->dhammaSchoolPrinciple = $dhammaSchoolPrinciple;
            $DS->studentCount = $studentCount;
            $DS->temple_id = $temple_id;
            $DS -> update();

            $JsonRes=[
                "message" => "Successfully Update Dhamma School",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message"=>"Successfully Update Dhamma School"],200);
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
