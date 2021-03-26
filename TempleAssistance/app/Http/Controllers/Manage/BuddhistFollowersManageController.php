<?php

namespace App\Http\Controllers\Manage;

use App\Model\BfHasAddress;
use App\Model\BfHasEmail;
use App\Model\BfHasPhone;
use App\Model\BuddhistFollowers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BuddhistFollowersManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $BF = BuddhistFollowers::join('temple','buddhist_followers.temple_id','=','temple.id')
            ->select('buddhist_followers.id as id','buddhist_followers.firstName','buddhist_followers.lastName','buddhist_followers.NIC','temple.id as temple_id','temple.templeName')
           ->get();

       // $BF = BuddhistFollowers::get();

        $BFARY=array();
        foreach ($BF as $item){

            $BFHA = BfHasAddress::join('address','bf_has_address.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->join('district','city.district_id','=','district.id')
                ->join('province','district.province_id','=','province.id')
                ->where('bf_has_address.id','=',$item->id)
                ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
                ->get();

            $BFHP = BfHasPhone::join('phone','bf_has_phone.phone_id','=','phone.id')
                ->where('bf_has_phone.buddhist_followers_id','=',$item->id)
                ->select('phone.id as id','phone.phoneName','phone.isPrimary','bf_has_phone.id as temporaryPhoneId')
                ->get();



            $BFHE = BfHasEmail::join('email','bf_has_email.email_id','=','email.id')
                ->where('bf_has_email.buddhist_followers_id','=',$item->id)
                ->select('email.id as id','email.emailName','email.isPrimary','bf_has_email.id as temporaryEmailId')
                ->get();
            $res = [
                'id' =>$item ->id,
                'firstName'=>$item->firstName,
                'lastName'=>$item->lastName,
                'NIC'=>$item->NIC,

                'temple_id'=>$item->temple_id,
                'templeName'=>$item->templeName,

                'BFHA'=>$BFHA,
                'BFHP'=>$BFHP,
                'BFHE' => $BFHE

            ];

            array_push($BFARY,$res);
        }

        return response()->json(["message" => "Success","response "=>$BFARY], 200);
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

       // $BF = BuddhistFollowers::find($id);
        $BF = BuddhistFollowers::join('temple','buddhist_followers.temple_id','=','temple.id')
            ->select('buddhist_followers.id as id','buddhist_followers.firstName','buddhist_followers.lastName','buddhist_followers.NIC','temple.id as temple_id','temple.templeName')
            ->first();

        $BFHA = BfHasAddress::join('address','bf_has_address.address_id','=','address.id')
                ->join('city','address.city_id','=','city.id')
                ->join('district','city.district_id','=','district.id')
                ->join('province','district.province_id','=','province.id')
                ->where('bf_has_address.id','=',$id)
                ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
                ->get();

        $BFHP = BfHasPhone::join('phone','bf_has_phone.phone_id','=','phone.id')
                ->where('bf_has_phone.buddhist_followers_id','=',$id)
                ->select('phone.id as id','phone.phoneName','phone.isPrimary','bf_has_phone.id as temporaryPhoneId')
                ->get();



        $BFHE = BfHasEmail::join('email','bf_has_email.email_id','=','email.id')
                ->where('bf_has_email.buddhist_followers_id','=',$id)
                ->select('email.id as id','email.emailName','email.isPrimary','bf_has_email.id as temporaryEmailId')
                ->get();
        $res = [
                'id' =>$BF ->id,
                'firstName'=>$BF->firstName,
                'lastName'=>$BF->lastName,
                'NIC'=>$BF->NIC,

                'temple_id'=>$BF->temple_id,
                'templeName'=>$BF->templeName,

                'BFHA'=>$BFHA,
                'BFHP'=>$BFHP,
                'BFHE' => $BFHE

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
        $BF = BuddhistFollowers::find($id);
        $approved_status=$BF->isApproved;
        $BF->isApproved=!$approved_status;
        $BF->update();

        return response()->json(["message" => "Status changed" ], 200);
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
