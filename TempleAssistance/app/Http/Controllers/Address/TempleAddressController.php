<?php

namespace App\Http\Controllers\Address;

use App\Model\Address;
use App\Model\TempleHasAddress;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\JwtDecoderHelper;

use Illuminate\Support\Facades\Auth;
use Validator;

class TempleAddressController extends Controller
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

        $TMHA = TempleHasAddress::join('address','temple_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('temple_has_address.temple_id','=',$userid)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->get();


        return response()->json(["message"=>"Find all Temple Address","response"=>$TMHA],200);

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
            'temple_id' => 'required|numeric',

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
            $temple_id = $request->temple_id;


            $AD = new Address();
            $AD->addressLine1 = $addressLine1;
            $AD->addressLine2  = $addressLine2 ;
            $AD->city_id  = $city_id ;
            $AD->save();

            $TMHA = new TempleHasAddress();
            $TMHA ->address_id = $AD ->id;
            $TMHA -> temple_id = $temple_id;
            $TMHA->save();



            return response()->json(["message" => "Successfully Insert Temple Address"], 200);
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
//        $TMHA = TempleHasAddress::find($id);
//        $AD= Address::find($TMHA->address_id);

        $TMHA = TempleHasAddress::join('address','temple_has_address.address_id','=','address.id')
            ->join('city','address.city_id','=','city.id')
            ->join('district','city.district_id','=','district.id')
            ->join('province','district.province_id','=','province.id')
            ->where('temple_has_address.id','=',$id)
            ->select('address.id as id','address.addressLine1','address.addressLine2','city.id as city_id','city.cityName','district.id as district_id','district.districtName','province.id as province_id', 'province.provinceName')
            ->first();


        return response()->json(["message"=>"Find one Temple Address","response"=>$TMHA],200);
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


            $TMHA = TempleHasAddress::find($id);

            $AD= Address::find($TMHA->address_id);
            $AD->addressLine1 = $addressLine1 ;
            $AD->addressLine2 = $addressLine2 ;
            $AD->city_id = $city_id ;
            $AD->update();

            return response()->json(["message"=>"Successfully Update Temple Address"],200);

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
        $AD = Address::find($id);
        $AD -> delete();
        return response()->json(["message"=>"Delete Successfully Temple Address"],200);


    }
}
