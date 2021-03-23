<?php

namespace App\Http\Controllers\Profile;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\BfHasAddress;
use App\Model\BfHasEmail;
use App\Model\BfHasPhone;
use App\Model\BuddhistFollowers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class BuddhistFollowersProfileController extends Controller
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
    public function show($id, Request $request)
    {

        $SESSION_KEY_TOKEN = $request->header('Session-Key');
        $userid = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];

        //$BF = BuddhistFollowers::find($id)
        $BF = BuddhistFollowers::find($userid)
            ->first();

        $BFHA = BfHasAddress::join('address','bf_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('bf_has_address.buddhist_followers_id','=',$userid)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $BFHP = BfHasPhone::join('phone','bf_has_phone.phone_id','=','phone.id')
            ->where('bf_has_phone.buddhist_followers_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','bf_has_phone.id as temporaryPhoneId')
            ->get();

        $BFHE = BfHasEmail::join('email','bf_has_email.email_id','=','email.id')
            ->where('bf_has_email.buddhist_followers_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','bf_has_email.id as temporaryEmailId')
            ->get();


        $res=[
            'id'=>$BF->id,
            'firstName'=>$BF->firstName,
            'lastName'=>$BF->lastName,
            'NIC'=>$BF->NIC,
            'BFHA'=>$BFHA,
            'BFHP'=>$BFHP,
            'BFHE'=>$BFHE

        ];

        return response()->json(["message" => "One Buddhist Followers" ,"response" => $res], 200);
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
            'firstName' => 'required|min:2|max:45',
            'lastName' =>'required|min:2|max:45',
            'NIC' => 'required|min:2|max:15',
           // 'temple_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {

            $SESSION_KEY_TOKEN = $request->header('Session-Key');
            $userid = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];

            $firstName = $request->firstName;
            $lastName = $request->lastName;
            $NIC = $request->NIC;
           // $temple_id = $request->temple_id;
            $isApproved = false;


            $BF = BuddhistFollowers::find($userid);
            $BF->firstName = $firstName;
            $BF->lastName = $lastName;
            $BF->NIC  = $NIC ;
          //  $BF->temple_id = $temple_id;
            $BF->isApproved = $isApproved;
            $BF->update();



            return response()->json(["message" => "Successfully Update BuddhistFollower"], 200);
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
