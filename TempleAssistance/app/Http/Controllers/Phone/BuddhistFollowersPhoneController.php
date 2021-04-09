<?php

namespace App\Http\Controllers\Phone;


use App\Http\Helpers\JwtDecoderHelper;
use App\Model\BfHasPhone;
use App\Model\BuddhistFollowers;
use App\Model\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
class BuddhistFollowersPhoneController extends Controller
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

        $BFHP = BfHasPhone::join('phone','bf_has_phone.phone_id','=','phone.id')
            ->where('bf_has_phone.buddhist_followers_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','bf_has_phone.id as temporaryPhoneId')
            ->get();
        $JsonRes=[
            "message" => "Find all Buddhist Followers phone",
            "status" => 200,
            "response" => $BFHP,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message"=>"Find all Buddhist Followers phone","response"=>$BFHP],200);
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

            'phoneName' => 'required|min:1|max:15',
            'isPrimary' => 'required',
            'buddhist_followers_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary = $request ->isPrimary;
            $buddhist_followers_id = $request ->buddhist_followers_id;


            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            $BFHP = new BfHasPhone();

            $BFHP ->phone_id = $PN -> id;
            $BFHP ->buddhist_followers_id = $buddhist_followers_id;
            $BFHP ->save();
            $JsonRes=[
                "message" => "Successfully Insert Buddhist Followers Phone Number",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Insert Buddhist Followers Phone Number"],200);

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
        $BFHP = BfHasPhone::join('phone','bf_has_phone.phone_id','=','phone.id')
            ->where('bf_has_phone.id','=' , $id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','bf_has_phone.id as temporaryPhoneId')
            ->first();

        $JsonRes=[
            "message" => "Find one Buddhist Followers phone",
            "status" => 200,
            "response" => $BFHP,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Buddhist Followers phone","response"=>$BFHP],200);
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

            'phoneName' => 'required|min:1|max:15',
            'isPrimary' => 'required'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary =$request ->isPrimary;

            $BFHP = WelfareHasPhone::find($id);

            $PN = Phone::find($BFHP->phone_id);
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->update();
            $JsonRes=[
                "message" => "Successfully Update Buddhist Followers Phone Number",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Update Buddhist Followers Phone Number"],200);

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
        $BFHP = BfHasPhone::find($id);

        $PN = Phone::find($BFHP ->phone_id);
        if($PN->isPrimary){

            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $BFHP ->delete();
            $PN->delete();

            $JsonRes=[
                "message" => "Delete Buddhist Followers Phone Number ",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Delete Buddhist Followers Phone Number "],200);
        }
    }
}
