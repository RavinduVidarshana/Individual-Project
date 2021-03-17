<?php

namespace App\Http\Controllers\Address;

use App\Model\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
class DhammaSchoolAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $AD = Address:: get();

        return response()->json(["message"=>"Find all Buddhist Schooladdresses","status"=>$AD],200);
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


            $AD = new Address();
            $AD->addressLine1 = $addressLine1;
            $AD->addressLine2 = $addressLine2;
            $AD->city_id = $city_id;
            $AD->save();

//            $TAD = new TempleHasAddress();
//            $TAD ->address_id = $AD ->id;
//            $TM = Temple:: get($id);
//            $TAD -> temple_id = $TM ->id;
//            $TAD->save();


            return response()->json(["message" => "Successfully Insert Buddhist School Address"], 200);
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
        $AD = Address::find($id);

        return response()->json(["message"=>"Find One Buddhist School Address","status"=>$AD],200);
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


            $AD= Address::find($id);
            $AD->addressLine1 = $addressLine1 ;
            $AD->addressLine2 = $addressLine2 ;
            $AD->city_id = $city_id ;
            $AD->update();

            return response()->json(["message"=>"Successfully Update Buddhist School Address"],200);

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
        return response()->json(["message"=>"Delete Successfully Buddhist School Address"],200);
    }
}
