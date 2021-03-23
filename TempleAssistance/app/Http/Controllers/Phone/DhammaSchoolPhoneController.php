<?php

namespace App\Http\Controllers\Phone;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\DhammaSchoolHasPhone;
use App\Model\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class DhammaSchoolPhoneController extends Controller
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

        $DMHP = DhammaSchoolHasPhone::join('phone','dhamma_school_has_phone.phone_id','=','phone.id')
            ->where('dhamma_school_has_phone.dhamma_school_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','dhamma_school_has_phone.id as temporaryPhoneId')
            ->get();

        return response()->json(["message"=>"Find all Dhamma School phone","response"=>$DMHP],200);
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
            'dhamma_school_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary = $request ->isPrimary;
            $dhamma_school_id = $request ->dhamma_school_id;


            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            $DMHP = new DhammaSchoolHasPhone();
            $DMHP  ->phone_id = $PN -> id;
            $DMHP  ->dhamma_school_id = $dhamma_school_id;
            $DMHP  ->save();

            return response()->json(["message"=>"Successfully Insert Dhamma School Phone Number"],200);

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
        $DMHP = DhammaSchoolHasPhone::join('phone','dhamma_school_has_phone.phone_id','=','phone.id')
            ->where('dhamma_school_has_phone.id','=' , $id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','dhamma_school_has_phone.id as temporaryPhoneId')
            ->first();

        return response()->json(["message"=>"Find all DhammaSchool phone","response"=>$DMHP],200);

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

            $DMHP = DhammaSchoolHasPhone::find($id);

            $PN = Phone::find($DMHP->phone_id);
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->update();

            return response()->json(["message"=>"Successfully Update Dhamma School Phone Number"],200);

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
        $DMHP = DhammaSchoolHasPhone::find($id);

        $PN = Phone::find($DMHP->phone_id);
        if($PN->isPrimary){
            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $DMHP->delete();
            $PN->delete();
            return response()->json(["message"=>"Delete DhammaSchool Phone Number "],200);
        }

    }
}
