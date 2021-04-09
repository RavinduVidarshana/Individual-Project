<?php

namespace App\Http\Controllers\Analytical;

use App\Http\Helpers\JwtDecoderHelper;
use App\Model\DaneScheduleHasBf;
use App\Model\DaneShedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class ReservedController extends Controller
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

        $DAN= DaneShedule:: join('dane_schedule_has_bf','dane_schedule_has_bf.dane_shedule_id','=','dane_shedule.id')
            -> join('temple','dane_shedule.temple_id','=','temple.id')
            -> join('dane_time','dane_shedule.dane_time_id','=','dane_time.id')
            ->where('dane_schedule_has_bf.buddhist_followers_id', $userid)
            ->select('dane_shedule.id as id','dane_shedule.date','dane_shedule.monkCount','dane_shedule.vegMonkCount','dane_shedule.nonVegMonkCount','dane_shedule.bfCount','dane_shedule.temple_id','dane_shedule.dane_time_id','temple.templeName','dane_time.daneTimeName')
            ->get();



        $DSARY=array();
        foreach ($DAN as $item){
            $DSHB = DaneScheduleHasBf:: join('buddhist_followers', 'dane_schedule_has_bf.buddhist_followers_id', '=', 'buddhist_followers.id')
                ->where('dane_schedule_has_bf.dane_shedule_id', $item ->id)
                ->select('buddhist_followers.id as bfid', 'buddhist_followers.firstName', 'buddhist_followers.lastName', 'buddhist_followers.NIC')
                ->get();
            $res = [
                'id' =>$item ->id,
                'DSHB' => $DSHB,
                "date" => $item->date->format('d-m-Y'),
                "monkCount" => $item->monkCount,
                "vegMonkCount" => $item->vegMonkCount,
                "nonVegMonkCount" => $item->nonVegMonkCount,
                "bfCount" => $item->bfCount,
                "temple_id" => $item->temple_id,
                "templeName" => $item->templeName,
                "dane_time_id" => $item->dane_time_id,
                "daneTimeName" => $item->daneTimeName


            ];

            array_push($DSARY,$res);
        }

        $JsonRes=[
            "message" => "Find all Reserved Dane Schedule",
            "status" => 200,
            "response" => $DSARY,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "Find all Reserved Dane Schedule", "response" => $DSARY], 200);
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

            'dane_shedule_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $dane_shedule_id = $request->dane_shedule_id;
            $SESSION_KEY_TOKEN = $request->header('Session-Key');
            $buddhist_followers_id = JwtDecoderHelper::decode($SESSION_KEY_TOKEN)['claims']['userID'];

            $DANHB = new DaneScheduleHasBf();
            $DANHB->dane_shedule_id = $dane_shedule_id;
            $DANHB->buddhist_followers_id = $buddhist_followers_id;
            $DANHB->save();

            $DS = DaneShedule::find($dane_shedule_id);
            $BFCOUNT = $DS ->bfCount + 1;
            $DS -> bfCount = $BFCOUNT;
            $DS  -> isBook = true;
            $DS -> update();

            $JsonRes=[
                "message" => "Successfully Reserved Dane Shedule",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message" => "Successfully Reserved Dane Shedule"], 200);
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
        $DAN = DaneShedule::  where('id', $id)
            ->first();

        $DANS = DaneScheduleHasBf:: join('buddhist_followers', 'dane_schedule_has_bf.buddhist_followers_id', '=', 'buddhist_followers.id')
            ->where('dane_schedule_has_bf.dane_shedule_id', $id)
            ->select('buddhist_followers.id as bfid', 'buddhist_followers.firstName', 'buddhist_followers.lastName', 'buddhist_followers.NIC')
            ->get();
        //$sub = array('dshb' => $DANS, "date" => $DAN->date->format('d-m-Y'), "monkCount" => $DAN->monkCount, "isBook" => $DAN->isBook, "vegMonkCount" => $DAN->vegMonkCount, "nonVegMonkCount" => $DAN->nonVegMonkCount, "bfCount" => $DAN->bfCount, "temple_id" => $DAN->temple_id, "dane_time_id" => $DAN->dane_time_id);
        $res = [
            'dshb' => $DANS,
            "date" => $DAN->date->format('d-m-Y'),
            "monkCount" => $DAN->monkCount,
            "isBook" => $DAN->isBook,
            "vegMonkCount" => $DAN->vegMonkCount,
            "nonVegMonkCount" => $DAN->nonVegMonkCount,
            "bfCount" => $DAN->bfCount,
            "temple_id" => $DAN->temple_id,
            "dane_time_id" => $DAN->dane_time_id
        ];

        $JsonRes=[
            "message" => "Find one Dane Schedule",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message" => "Find one Dane Schedule", "response" => $res], 200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
