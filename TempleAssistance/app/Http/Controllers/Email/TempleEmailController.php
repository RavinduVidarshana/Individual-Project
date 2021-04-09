<?php

namespace App\Http\Controllers\Email;

use App\Model\Email;
use App\Model\TempleHasEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\JwtDecoderHelper;

use Validator;

class TempleEmailController extends Controller
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

        $TMHE = TempleHasEmail::join('email','temple_has_email.email_id','=','email.id')
            ->where('temple_has_email.email_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','temple_has_email.id as temporaryEmailId')
            ->get();
        $JsonRes=[
            "message" => "Find all Temple Emails",
            "status" => 200,
            "response" => $TMHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find all Temple Emails","response"=>$TMHE],200);
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

            'emailName' => 'required|min:8|max:100',
            'isPrimary' => 'required',
            'temple_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $emailName = $request->emailName;
            $isPrimary =$request->isPrimary;


            $temple_id = $request ->temple_id;


            $EM = new Email();
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->save();

            $TMHE = new TempleHasEmail();
            $TMHE -> email_id  =  $EM -> id;
            $TMHE ->temple_id = $temple_id;
            $TMHE -> save();

            $JsonRes=[
                "message" => "Successfully Insert Temple Emai",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message"=>"Successfully Insert Temple Email"],200);

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
        $TMHE = TempleHasEmail::join('email','temple_has_email.email_id','=','email.id')
            ->where('temple_has_email.id','=' , $id)
            ->select('email.id as id','email.emailName','email.isPrimary','temple_has_email.id as temporaryEmailId')
            ->first();
        $JsonRes=[
            "message" => "Find one Temple Email",
            "status" => 200,
            "response" => $TMHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Temple Email","response"=>$TMHE],200);
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

            'emailName' => 'required|min:8|max:100',
            'isPrimary' => 'required',
            'buddhist_followers_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $emailName = $request->emailName;
            $isPrimary =$request->isPrimary;

            $TMHE = TempleHasEmail::find($id);
            $EM = Email::find($TMHE -> email_id);
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->update();

            $JsonRes=[
                "message" => "Successfully Update Temple Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Update Temple Email"],200);

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
        $TMHE = TempleHasEmail::find($id);

        $EM = Email::find($TMHE -> email_id);
        if($EM->isPrimary){

            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $TMHE->delete();
            $EM->delete();

            $JsonRes=[
                "message" => "Delete Temple Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Delete Temple Email "],200);
        }

    }
}
