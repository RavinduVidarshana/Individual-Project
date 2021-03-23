<?php

namespace App\Http\Controllers\Phone;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\Phone;
use App\Model\WelfareHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class WelfareSocietyPhoneController extends Controller
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

        $WSHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id','=','phone.id')
            ->where('welfare_has_phone.welfare_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','welfare_has_phone.id as temporaryPhoneId')
            ->get();

        return response()->json(["message"=>"Find all Welfare phone","response"=>$WSHP],200);
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
            'welfare_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary = $request ->isPrimary;

            $welfare_id = $request ->welfare_id;


            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            $WSHP = new WelfareHasPhone();
            $WSHP ->phone_id = $PN -> id;
            $WSHP ->welfare_id = $welfare_id;
            $WSHP ->save();

            return response()->json(["message"=>"Successfully Insert Welfare Society Phone Number"],200);

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
        $WSHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id','=','phone.id')
            ->where('welfare_has_phone.id','=' , $id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','welfare_has_phone.id as temporaryPhoneId')
            ->first();

        return response()->json(["message"=>"Find one Welfare Phone phone","response"=>$WSHP],200);
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

            $WSHP = WelfareHasPhone::find($id);

            $PN = Phone::find($WSHP->phone_id);
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->update();

            return response()->json(["message"=>"Successfully Update Welfare Society Phone Number"],200);

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
        $WSHP = WelfareHasPhone::join('phone','welfare_has_phone.phone_id','=','phone.id')
            ->where('welfare_has_phone.id','=' , $id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','welfare_has_phone.id as temporaryPhoneId')
            ->first();

        return response()->json(["message"=>"Find all Temple phone","response"=>$WSHP],200);
    }
}
