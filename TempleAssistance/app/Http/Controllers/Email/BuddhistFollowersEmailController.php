<?php

namespace App\Http\Controllers\Email;

use App\Model\BfHasEmail;
use App\Model\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\JwtDecoderHelper;

use Validator;
class BuddhistFollowersEmailController extends Controller
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

        $BFHE = BfHasEmail::join('email','bf_has_email.email_id','=','email.id')
            ->where('bf_has_email.buddhist_followers_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','bf_has_email.id as temporaryEmailId')
            ->get();

        $JsonRes=[
            "message" => "Find all Buddhist Followers Emails",
            "status" => 200,
            "response" => $BFHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find all Buddhist Followers Emails","response"=>$BFHE],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

            $buddhist_followers_id = $request ->buddhist_followers_id;


            $EM = new Email();
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->save();

            $BFHE = new BfHasEmail();
            $BFHE -> email_id  =  $EM -> id;
            $BFHE ->buddhist_followers_id = $buddhist_followers_id;
            $BFHE -> save();

            $JsonRes=[
                "message" => "Successfully Insert Buddhist Followers Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message"=>"Successfully Insert Buddhist Followers Email"],200);

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
        $BFHE = BfHasEmail::join('email','bf_has_email.email_id','=','email.id')
            ->where('bf_has_email.id','=' , $id)
            ->select('email.id as id','email.emailName','email.isPrimary','bf_has_email.id as temporaryEmailId')
            ->first();

        $JsonRes=[
            "message" => "Find one Buddhist Followers Email",
            "status" => 200,
            "response" => $BFHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Buddhist Followers Email","response"=>$BFHE],200);
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
            $isPrimary = $request->isPrimary;

            $BFHE = BfHasEmail::find($id);
            $EM = Email::find($BFHE->email_id);
            $EM->emailName = $emailName;
            $EM->isPrimary = $isPrimary;
            $EM->update();

            $JsonRes=[
                "message" => "Successfully Update Buddhist Followers Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message" => "Successfully Update Buddhist Followers Email"], 200);
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
        $BFHE = BfHasEmail::find($id);

        $EM = Email::find($BFHE -> email_id);
        if($EM->isPrimary){
            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $BFHE->delete();
            $EM->delete();

            $JsonRes=[
                "message" => "Delete Buddhist Followers Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
            //            return response()->json(["message"=>"Delete Buddhist Followers Email "],200);
        }
    }
}
