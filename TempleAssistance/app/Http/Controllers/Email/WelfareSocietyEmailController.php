<?php

namespace App\Http\Controllers\Email;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\Email;
use App\Model\WelfareHasEmail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class WelfareSocietyEmailController extends Controller
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

        $WSHE = WelfareHasEmail::join('email','welfare_has_email.email_id','=','email.id')
            ->where('welfare_has_email.email_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','welfare_has_email.id as temporaryEmailId')
            ->get();

        $JsonRes=[
            "message" => "Find all Welafare Society Emails",
            "status" => 200,
            "response" => $WSHE,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message"=>"Find all Welafare Society Emails","response"=>$WSHE],200);
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
            'welfare_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $emailName = $request->emailName;
            $isPrimary =$request->isPrimary;

            $welfare_id = $request ->welfare_id;


            $EM = new Email();
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->save();

            $WSHE = new WelfareHasEmail();
            $WSHE -> email_id  =  $EM -> id;
            $WSHE -> welfare_id = $welfare_id;
            $WSHE -> save();

            $JsonRes=[
                "message" => "Successfully Insert Welfare Society Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Insert Welfare Society Email"],200);

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
        $WSHE = WelfareHasEmail::join('email','welfare_has_email.email_id','=','email.id')
            ->where('welfare_has_email.id','=' , $id)
            ->select('email.id as id','email.emailName','email.isPrimary','welfare_has_email.id as temporaryEmailId')
            ->first();

        $JsonRes=[
            "message" => "Find one WelfareSociety Email",
            "status" => 200,
            "response" => $WSHE,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message"=>"Find one WelfareSociety Email","response"=>$WSHE],200);
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
            'isPrimary' => 'required'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $emailName = $request->emailName;
            $isPrimary =$request->isPrimary;

            $WSHE = WelfareHasEmail::find($id);
            $EM = Email::find($WSHE -> email_id);
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->update();

            $JsonRes=[
                "message" => "Successfully Update WelfareSociety Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Update WelfareSociety Email"],200);

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
        $WSHE = WelfareHasEmail::find($id);

        $EM = Email::find($WSHE -> email_id);
        if($EM->isPrimary){

            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $WSHE->delete();
            $EM->delete();
            $JsonRes=[
                "message" => "Delete Temple WelfareSociety Email ",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Delete WelfareSociety Email "],200);
        }
    }
}
