<?php

namespace App\Http\Controllers;

use App\Model\DaneScheduleHasBf;
use App\Model\DaneShedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Validator;

class DaneScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DAN = DaneShedule:: join('dane_time', 'dane_shedule.dane_time_id', '=', 'dane_time.id')
        ->select("dane_shedule.id as id","dane_shedule.monkCount","dane_shedule.isBook","dane_shedule.vegMonkCount","dane_shedule.nonVegMonkCount","dane_shedule.bfCount","dane_shedule.date","dane_shedule.temple_id","dane_time.id as dane_time_id","dane_time.daneTimeName")
        ->get();

        $DANAY = array();
        foreach ($DAN as $item) {
            $DANS = DaneScheduleHasBf:: join('buddhist_followers', 'dane_schedule_has_bf.buddhist_followers_id', '=', 'buddhist_followers.id')
                ->where('dane_schedule_has_bf.dane_shedule_id', $item->id)
                ->select('buddhist_followers.id as bfid', 'buddhist_followers.firstName', 'buddhist_followers.lastName', 'buddhist_followers.NIC')
                ->get();
            $sub = array('dshb' => $DANS,"id" => $item->id , "date" => $item->date->format('d-m-Y'), "monkCount" => $item->monkCount, "isBook" => $item->isBook, "vegMonkCount" => $item->vegMonkCount, "nonVegMonkCount" => $item->nonVegMonkCount, "bfCount" => $item->bfCount, "temple_id" => $item->temple_id, "dane_time_id" => $item->dane_time_id, "daneTimeName" =>$item->daneTimeName);
            array_push($DANAY, $sub);
        }

        $JsonRes=[
            "message" => "Find all Dane Schedule",
            "status" => 200,
            "response" => $DANAY,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message" => "Find all Dane Shedule", "status" => $DANAY], 200);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'date' => 'required|date_format:Y-m-d|after:today',
            'monkCount' => 'required|min:1|numeric',
            'vegMonkCount' => 'required|min:1|numeric',
            'nonVegMonkCount' => 'required|min:1|numeric',
//            'temple_id' => 'required|numeric',
            'dane_time_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {

            $JsonRes=[
                "message" => "Validation Failure",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 400);


        } else {
            $date = $request->date;
            $monkCount = $request->monkCount;
            $vegMonkCount = $request->vegMonkCount;
            $nonVegMonkCount = $request->nonVegMonkCount;
            $bfCount = 0;
            $temple_id = $request->temple_id;
            $dane_time_id = $request->dane_time_id;
            $isBook = false;


            $DAN = new DaneShedule();
            $DAN->date = $date;
            $DAN->monkCount = $monkCount;
            $DAN->vegMonkCount = $vegMonkCount;
            $DAN->nonVegMonkCount = $nonVegMonkCount;
            $DAN->bfCount = $bfCount;
            $DAN->temple_id = $temple_id;
            $DAN->dane_time_id = $dane_time_id;
            $DAN->isBook = $isBook;
            $DAN->save();

            $JsonRes=[
                "message" => "Successfully Insert Dane Schedule",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message" => "Successfully Insert Dane Shedule"], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $DAN = DaneShedule:: join('dane_time', 'dane_shedule.dane_time_id', '=', 'dane_time.id')
            ->select("dane_shedule.id as id","dane_shedule.monkCount","dane_shedule.isBook","dane_shedule.vegMonkCount","dane_shedule.nonVegMonkCount","dane_shedule.bfCount","dane_shedule.date","dane_shedule.temple_id","dane_time.id as dane_time_id","dane_time.daneTimeName")
           -> where('dane_shedule.id', $id)
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
            "dane_time_id" => $DAN->dane_time_id,
            "daneTimeName" => $DAN->daneTimeName
        ];

        $JsonRes=[
            "message" => "Find one Dane Schedule",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'date' => 'required|date_format:Y-m-d|after:today',
            'monkCount' => 'required|min:1|numeric',
            'vegMonkCount' => 'required|min:1|numeric',
            'nonVegMonkCount' => 'required|min:1|numeric',
            'dane_time_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            $JsonRes=[
                "message" => "Validation Failure",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 400);

        } else {
            $date = $request->date;
            $monkCount = $request->monkCount;
            $vegMonkCount = $request->vegMonkCount;
            $nonVegMonkCount = $request->nonVegMonkCount;
            $dane_time_id = $request->dane_time_id;
            $isBook = false;


            $DAN = DaneShedule:: find($id);
            $DAN->date = $date;
            $DAN->monkCount = $monkCount;
            $DAN->vegMonkCount = $vegMonkCount;
            $DAN->nonVegMonkCount = $nonVegMonkCount;
            $DAN->dane_time_id = $dane_time_id;
            $DAN->isBook = $isBook;
            $DAN->update();

            $JsonRes=[
                "message" => "Successfully Update Dane Schedule",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//            return response()->json(["message" => "Successfully Update Dane Schedule"], 200);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        DaneShedule:: where('isBook', 0)
//            ->where('id', $id)
//            ->delete();
//
//        $JsonRes=[
//            "message" => "Delete Dane Shedule",
//            "status" => 200,
//            "response" => "",
//        ];
//        return response()->json($JsonRes, 200);
//        return response()->json(["message" => "Delete Dane Shedule "], 200);

        $isBook= false;

        $DS = News::DaneShedule($id);
        $DS->isActive= $isBook;
        $DS->update();

        $JsonRes=[
            "message" => "Delete News",
            "status" => 200,
            "response" => "",
        ];
        return response()->json($JsonRes, 200);


    }
}
