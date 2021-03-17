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
        $DAN = DaneShedule:: get();
//        select("monkCount","isBook","vegMonkCount","nonVegMonkCount","bfCount","temple_id","dane_time_id", DB::raw("DATE_FORMAT(date,'%d-%b-%Y') as date"))
//        ->get();

        $DANAY = array();
        foreach ($DAN as $item) {
            $DANS = DaneScheduleHasBf:: join('buddhist_followers', 'dane_schedule_has_bf.buddhist_followers_id', '=', 'buddhist_followers.id')
                ->where('dane_schedule_has_bf.dane_shedule_id', $item->id)
                ->select('buddhist_followers.id as bfid', 'buddhist_followers.firstName', 'buddhist_followers.lastName', 'buddhist_followers.NIC')
                ->get();
            $sub = array('dshb' => $DANS, "date" => $item->date->format('d-m-Y'), "monkCount" => $item->monkCount, "isBook" => $item->isBook, "vegMonkCount" => $item->vegMonkCount, "nonVegMonkCount" => $item->nonVegMonkCount, "bfCount" => $item->bfCount, "temple_id" => $item->temple_id, "dane_time_id" => $item->dane_time_id);
            array_push($DANAY, $sub);
        }

        return response()->json(["message" => "Find all Dane Shedule", "status" => $DANAY], 200);
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
            'temple_id' => 'required|numeric',
            'dane_time_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

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


            return response()->json(["message" => "Successfully Insert Dane Shedule"], 200);
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

        return response()->json(["message" => "Find one Dane Schedule", "response" => $res], 200);
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
            return response()->json($validator->errors(), 400);

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


            return response()->json(["message" => "Successfully Update Dane Schedule"], 200);



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
        DaneShedule:: where('isBook', 0)
            ->where('id', $id)
            ->delete();

        return response()->json(["message" => "Delete Dane Shedule "], 200);
    }
}
