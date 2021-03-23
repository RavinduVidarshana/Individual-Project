<?php

namespace App\Http\Controllers\Phone;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\Phone;
use App\Model\TempleHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class TemplePhoneController extends Controller
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

        $TMHP = TempleHasPhone::join('phone','temple_has_phone.phone_id','=','phone.id')
            ->where('temple_has_phone.temple_id','=',$userid)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','temple_has_phone.id as temporaryPhoneId')
            ->get();

        return response()->json(["message"=>"Find all Temple phone","response"=>$TMHP],200);
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
            'temple_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary = $request ->isPrimary;

            $temple_id = $request ->temple_id;


            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            $TMHP = new TempleHasPhone();
            $TMHP ->phone_id = $PN -> id;
            $TMHP ->temple_id = $temple_id;
            $TMHP ->save();

            return response()->json(["message"=>"Successfully Insert Temple Phone Number"],200);

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

        $TMHP = TempleHasPhone::join('phone','temple_has_phone.phone_id','=','phone.id')
            ->where('temple_has_phone.id','=' , $id)
            ->select('phone.id as id','phone.phoneName','phone.isPrimary','temple_has_phone.id as temporaryPhoneId')
            ->first();

        return response()->json(["message"=>"Find one Temple phone","response"=>$TMHP],200);
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

            $TMHP = TempleHasPhone::find($id);

            $PN = Phone::find($TMHP->phone_id);
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->update();

            return response()->json(["message"=>"Successfully Update Temple Phone Number"],200);

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
        $TMHP = TempleHasPhone::find($id);

        $PN = Phone::find($TMHP->phone_id);
        if($PN->isPrimary){
            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $TMHP->delete();
            $PN->delete();
            return response()->json(["message"=>"Delete Temple Phone Number "],200);
        }


    }
}
