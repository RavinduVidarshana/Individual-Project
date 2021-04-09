<?php

namespace App\Http\Controllers\Address;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\Address;
use App\Model\BfHasAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class BuddhistFollowersAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $SESSION_KEY_TOKEN = $request->header('Session-Key');
        $userid = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];

        $BFHA = BfHasAddress::join('address','bf_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('bf_has_address.buddhist_followers_id','=',$userid)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();

        $JsonRes=[
            "message" => "Find all Buddhist Followers Address",
            "status" => 200,
            "response" => $BFHA,
        ];
        return response()->json($JsonRes, 200);


//        return response()->json(["message"=>"Find all Buddhist Followers Address","response"=>$BFHA],200);

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
            'addressLine1' => 'required|min:2|max:145',
            'addressLine2' =>'required|min:2|max:145',
            'city_id' => 'required|numeric',
            'buddhist_followers_id' => 'required|numeric',

        ];
        $validator = Validator::make(
            $request ->all(),$rule
        );

        if($validator -> fails()){
            return  response() -> json($validator ->errors(),400);

        }else {
            $addressLine1 = $request->addressLine1;
            $addressLine2 = $request->addressLine2;
            $city_id = $request->city_id;
            $buddhist_followers_id = $request->buddhist_followers_id;


            $AD = new Address();
            $AD->addressLine1 = $addressLine1;
            $AD->addressLine2  = $addressLine2 ;
            $AD->city_id  = $city_id ;
            $AD->save();

            $BFHA = new BfHasAddress();
            $BFHA ->address_id = $AD ->id;
            $BFHA -> buddhist_followers_id = $buddhist_followers_id;
            $BFHA->save();


            $JsonRes=[
                "message" => "Successfully Insert Buddhist Followers Address",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message" => "Successfully Insert Buddhist Followers Address"], 200);
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

        $BFHA = BfHasAddress::join('address','bf_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('bf_has_address.id','=',$id)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->first();


        $JsonRes=[
            "message" => "Find one Buddhist Followers Address",
            "status" => 200,
            "response" => $BFHA,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Buddhist Followers Address","response"=>$BFHA],200);


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

            'addressLine1' => 'required|min:1|max:145',
            'addressLine2' => 'required|min:1|max:145',
            'city_id' => 'required|numeric',

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $addressLine1 = $request->addressLine1;
            $addressLine2 = $request->addressLine2;
            $city_id =$request->city_id;


            $BFHA = BfHasAddress::find($id);

            $AD= Address::find($BFHA->address_id);
            $AD->addressLine1 = $addressLine1 ;
            $AD->addressLine2 = $addressLine2 ;
            $AD->city_id = $city_id ;
            $AD->update();


            $JsonRes=[
                "message" => "Successfully Update Buddhist Followers Address",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Update Buddhist Followers Address"],200);

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
//        $AD = Address::find($id);
//        $AD -> delete();
//
//
//        $JsonRes=[
//            "message" => "Delete Successfully BuddhistFollowers Address",
//            "status" => 200,
//            "response" => "",
//        ];
//        return response()->json($JsonRes, 200);
////        return response()->json(["message"=>"Delete Successfully BuddhistFollowers Address"],200);


        $BFHA = BfHasAddress::find($id);
        $AD= Address::find($BFHA->address_id);
        if($AD->isPrimary){

            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $BFHA->delete();
            $AD->delete();

            $JsonRes=[
                "message" => "Delete Buddhist Followers Address",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Delete Buddhist Followers Address "],200);
        }
    }
}
