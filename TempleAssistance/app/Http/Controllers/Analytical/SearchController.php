<?php

namespace App\Http\Controllers\Analytical;

use App\Model\DaneScheduleHasBf;
use App\Model\DaneShedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $temple_category_id = $request -> temple_category_id;
        $temple_name = $request -> temple_name;
        $monk_count = $request -> monk_count;
        $dane_time_id = $request -> dane_time_id;

        $today=Carbon::now();

        $query = DaneShedule::join('temple','dane_shedule.temple_id','=','temple.id')
            ->join('dane_time','dane_shedule.dane_time_id','=' , 'dane_time.id')
            ->join('temple_category','temple.temple_category_id','=' , 'temple_category.id')
            ->where('dane_shedule.isBook','=',false)
            ->where('dane_shedule.date','>=',$today)
            ->orderBy('dane_shedule.id','DESC')
            ->select('dane_shedule.id as id','temple_category.id as templeCategoryId','dane_shedule.date','dane_shedule.monkCount','dane_shedule.vegMonkCount','dane_shedule.nonVegMonkCount','dane_shedule.bfCount','temple.id as templeId','temple.templeName','dane_time.id as daneTimeId','dane_time.daneTimeName');

//        if($temple_category_id==0 && empty($temple_name) && empty($monk_count) && $dane_time_id==0){
//            //1
//        }else if($temple_category_id==0 && empty($temple_name) && empty($monk_count) && $dane_time_id!=0){
//            //2
//            $query->where('dane_time.id','=',$dane_time_id);
//
//        }else if($temple_category_id==0 && empty($temple_name) && !empty($monk_count) && $dane_time_id==0){
//            //3
//            $query->where('dane_shedule.monkCount','<=',$monk_count);
//
//        }else if($temple_category_id==0 && empty($temple_name) && !empty($monk_count) && $dane_time_id!=0){
//            //4
//            $query->where('dane_shedule.monkCount','<=',$monk_count)
//                ->where('dane_time.id','=',$dane_time_id);
//
//
//        }else if($temple_category_id!=0 && !empty($temple_name) && empty($monk_count) && $dane_time_id==0){
//            //5
//            $query->where('temple.templeName','like','%'.$temple_name.'%');
//
//        }else if($temple_category_id==0 && !empty($temple_name) && empty($monk_count) && $dane_time_id!=0){
//            //6
//            $query->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_time.id','=',$dane_time_id);
//
//        }else if($temple_category_id==0 && !empty($temple_name) && !empty($monk_count) && $dane_time_id==0){
//            //7
//            $query->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_shedule.monkCount','<=',$monk_count);
//
//        }else if($temple_category_id==0 && !empty($temple_name) && !empty($monk_count) && $dane_time_id!=0){
//            //8
//            $query->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_shedule.monkCount','<=',$monk_count)
//                ->where('dane_time.id','=',$dane_time_id);
//
//
//        }else if($temple_category_id!=0 && empty($temple_name) && empty($monk_count) && $dane_time_id==0){
//            //9
//            $query->where('temple_category.id','=',$temple_category_id);
//
//        }else if($temple_category_id!=0 && empty($temple_name) && empty($monk_count) && $dane_time_id!=0){
//            //10
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('dane_time.id','=',$dane_time_id);
//
//        }else if($temple_category_id!=0 && empty($temple_name) && !empty($monk_count) && $dane_time_id==0){
//            //11
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('dane_shedule.monkCount','<=',$monk_count);
//
//        }else if($temple_category_id!=0 && empty($temple_name) && !empty($monk_count) && $dane_time_id!=0){
//            //12
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('dane_shedule.monkCount','<=',$monk_count)
//                ->where('dane_time.id','=',$dane_time_id);
//
//
//        }else if($temple_category_id!=0 && !empty($temple_name) && empty($monk_count) && $dane_time_id==0){
//            //13
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('temple.templeName','like','%'.$temple_name.'%');
//
//        }else if($temple_category_id!=0 && !empty($temple_name) && empty($monk_count) && $dane_time_id!=0){
//            //14
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_time.id','=',$dane_time_id);
//
//        }else if($temple_category_id!=0 && !empty($temple_name) && !empty($monk_count) && $dane_time_id==0){
//            //15
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_shedule.monkCount','<=',$monk_count);
//
//        }else if($temple_category_id!=0 && !empty($temple_name) && !empty($monk_count) && $dane_time_id!=0){
//            //16
//            $query->where('temple_category.id','=',$temple_category_id)
//                ->where('temple.templeName','like','%'.$temple_name.'%')
//                ->where('dane_shedule.monkCount','<=',$monk_count)
//                ->where('dane_time.id','=',$dane_time_id);
//        }
//

        if($temple_category_id!=0){
            $query->where('temple_category.id','=',$temple_category_id);
        }
        if(!empty($temple_name)){
            $query->where('temple.templeName','like','%'.$temple_name.'%');
        }
        if(!empty($monk_count) ){
            $query->where('dane_shedule.monkCount','<=',$monk_count);
        }
        if($dane_time_id!=0 ){
            $query->where('dane_time.id','=',$dane_time_id);
        }

        $resultcount=$query->count();
        $res=$query->get();

        if($resultcount==0){

            $JsonRes=[
                "message" => "No records found",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 400);

//            return response()->json(["message" => "No records found","response" =>$res], 401);
        }else{

            $JsonRes=[
                "message" => "Records found",
                "status" => 200,
                "response" => $res,
            ];
            return response()->json($JsonRes, 200);

//            return response()->json(["message" => "Records found","response" =>$res], 200);
        }

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
        //
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
            "response" => "",
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
