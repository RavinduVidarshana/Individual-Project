<?php

namespace App\Http\Controllers\Email;

use App\Http\Helpers\JwtDecoderHelper;
use app\Model\DhammaSchool;
use App\Model\DhammaSchoolHasEmail;
use App\Model\Email;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class DhammaSchoolEmailController extends Controller
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

        $DMHE = DhammaSchoolHasEmail::join('email','dhamma_school_has_email.email_id','=','email.id')
            ->where('dhamma_school_has_email.email_id','=',$userid)
            ->select('email.id as id','email.emailName','email.isPrimary','dhamma_school_has_email.id as temporaryEmailId')
            ->get();
        $JsonRes=[
            "message" => "Find all Dahmma School Emails",
            "status" => 200,
            "response" => $DMHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find all Dahmma School Emails","response"=>$DMHE],200);
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
            'dhamma_school_id'  => 'required|numeric'

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $emailName = $request->emailName;
            $isPrimary =$request->isPrimary;

            $dhamma_school_id = $request ->dhamma_school_id;

            $EM = new Email();
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->save();

            $DMHE = new DhammaSchoolHasEmail();
            $DMHE -> email_id  =  $EM -> id;
            $DMHE -> dhamma_school_id = $dhamma_school_id;
            $DMHE -> save();
            $JsonRes=[
                "message" => "Successfully Insert Dhamma School Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Insert Dhamma School Email"],200);

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
        $DMHE = DhammaSchoolHasEmail::join('email','dhamma_school_has_email.email_id','=','email.id')
            ->where('dhamma_school_has_email.id','=' , $id)
            ->select('email.id as id','email.emailName','email.isPrimary','dhamma_school_has_email.id as temporaryEmailId')
            ->first();


        $JsonRes=[
            "message" => "Find one Dhamma School  Email",
            "status" => 200,
            "response" => $DMHE,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find one Dhamma School  Email","response"=>$DMHE],200);
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

            $DMHE = DhammaSchoolHasEmail::find($id);
            $EM = Email::find($DMHE -> email_id);
            $EM->emailName = $emailName ;
            $EM->isPrimary = $isPrimary ;
            $EM->update();

            $JsonRes=[
                "message" => "Successfully Update Dhamma School  Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Successfully Update Dhamma School  Email"],200);

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
        $DMHE = DhammaSchoolHasEmail::find($id);

        $EM = Email::find($DMHE -> email_id);
        if($EM->isPrimary){

            $JsonRes=[
                "message" => "Can not delete primary values",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 401);
//            return response()->json(["message"=>"Can not delete primary values "],401);
        }else{
            $DMHE>delete();
            $EM->delete();

            $JsonRes=[
                "message" => "Delete Dhamma School Email",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message"=>"Delete Dhamma School Email"],200);
        }
    }
}
