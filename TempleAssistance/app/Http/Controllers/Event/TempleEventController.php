<?php

namespace App\Http\Controllers\Event;

use App\ExtraData\DefaultData;
use App\Model\Event;
use App\Model\EventHasPhone;
use App\Model\EventImage;
use App\Model\Phone;
use App\Model\TempleHasPhone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;
use Validator;

class TempleEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EV = Event :: join('event_catergory','event_catergory.id','=','event.event_catergory_id')
            ->join('event_organized','event_organized.id','=','event.event_organized_id')
            ->join('temple','temple.id','=','event.temple_id')
            ->where('event.event_organized_id',DefaultData::$EVENT_ORGANIZATION_TEMPLE)
            ->where('event.eventIsActive',1)
            ->select('event.id as id',
                'event.eventName',
                'event.eventInfo',
                'event.eventDateFrom',
                'event.eventDateTo',
                'event.eventIsActive',
                'event.isApproved',
                'event.longitude',
                'event.latitude',
                'event_catergory.id as event_catergory_id',
                'event_catergory.eventCatergoryName',
                'event_organized.id as event_organized_id',
                'event_organized.eventOrganizedName',
                'temple.id as temple_id',
                'temple.templeName')
            -> get();
        $EVARY=array();
        foreach ($EV as $item){
            $EHP = EventHasPhone::join('phone','event_has_phone.phone_id','=','phone.id')
                ->select('phone.id as id','phone.phoneName','phone.isPrimary')
                ->where('event_has_phone.event_id',$item->id)
                ->first();

            $EI = EventImage::where('event_id',$item->id)
                ->get();

            $res = [

//                "event_id" => $item->id,
                "id" => $item->id,
                "eventName" => $item->eventName,
                "eventInfo" => $item->eventInfo,
                "eventDateFrom" => $item->eventDateFrom ->format('d-m-Y'),
                "eventDateTo" => $item->eventDateTo ->format('d-m-Y'),
                "eventIsActive" => $item->eventIsActive,
                "isApproved" => $item->isApproved,
                "longitude" => $item->longitude,
                "latitude" => $item->latitude,
                "event_catergory_id" => $item->event_catergory_id,
                "eventCatergoryName" => $item->eventCatergoryName,
                "event_organized_id" => $item->event_organized_id,
                "eventOrganizedName" => $item->eventOrganizedName,
                "temple_id" => $item->temple_id,
                "templeName" => $item->templeName,

                'ehp' => $EHP,
                'ei' => $EI,

            ];

            array_push($EVARY,$res);
        }
        $JsonRes=[
            "message" => "Find all Temple Events",
            "status" => 200,
            "response" => $EVARY,
        ];
        return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Find all Temple Events","status"=>$EVARY],200);

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


            'eventName' => 'required|min:1|max:45',
            'eventInfo' => 'required|min:1|max:345',
            'eventDateFrom' => 'required',
            'eventDateTo' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'event_catergory_id' => 'required|numeric',
            'temple_id' => 'required|numeric',
            'phone_number' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {


            $JsonRes=[
                "message" => "Validation failure",
                "status" => 401,
                "response" => "",
            ];
            return response()->json($JsonRes, 400);


        } else {

            $eventName = $request->eventName;
            $eventInfo = $request->eventInfo;
            $eventDateFrom = $request->eventDateFrom;
            $eventDateTo = $request->eventDateTo;
            $eventIsActive = true;
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $event_catergory_id = $request->event_catergory_id;
            $event_organized_id =DefaultData::$EVENT_ORGANIZATION_TEMPLE;
            $temple_id = $request->temple_id;
            $phoneName = $request->phone_number;
            $isApproved =false;
            $isPrimary=true;



            $EV = new Event();

            $EV->eventName = $eventName;
            $EV->eventInfo = $eventInfo;
            $EV->eventDateFrom= $eventDateFrom;
            $EV->eventDateTo= $eventDateTo;
            $EV->eventIsActive =$eventIsActive;
            $EV->longitude= $longitude;
            $EV->latitude= $latitude;
            $EV->event_catergory_id = $event_catergory_id;
            $EV->event_organized_id = $event_organized_id;
            $EV->temple_id = $temple_id;
            $EV->isApproved = $isApproved ;
            $EV->save();

            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            $TMHP = new EventHasPhone();
            $TMHP ->phone_id = $PN -> id;
            $TMHP ->event_id = $EV->id;
            $TMHP ->save();

//            return response()->json(["message"=>"Successfully Insert Temple Event"],200);

            $JsonRes=[
                "message" => "Successfully Insert Temple Event",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);


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
        $EV = Event :: join('event_catergory','event_catergory.id','=','event.event_catergory_id')
        ->join('event_organized','event_organized.id','=','event.event_organized_id')
            ->join('temple','temple.id','=','event.temple_id')
            ->where('event.id',$id)
            ->select('event.id as id',
                'event.eventName',
                'event.eventInfo',
                'event.eventDateFrom',
                'event.eventDateTo',
                'event.eventIsActive',
                'event.longitude',
                'event.latitude',
                'event_catergory.id as event_catergory_id',
                'event_catergory.eventCatergoryName',
                'event_organized.id as event_organized_id',
                'event_organized.eventOrganizedName',
                'temple.id as temple_id',
                'temple.templeName')
            -> first();

        $EHP = EventHasPhone::join('phone','event_has_phone.phone_id','=','phone.id')
            ->select('phone.id as id','phone.phoneName','phone.isPrimary')
            ->where('event_has_phone.event_id',$id)
            ->get();

        $EI = EventImage::where('event_id',$id)
            ->get();

        $res = [

            "id" => $EV->id,
//            "event_id" => $EV->id,
            "eventName" => $EV->eventName,
            "eventInfo" => $EV->eventInfo,
            "eventDateFrom" => $EV->eventDateFrom ->format('Y-m-d h:i A'),
            "eventDateTo" => $EV->eventDateTo ->format('Y-m-d h:i A'),
            "eventIsActive" => $EV->eventIsActive,
            "longitude" => $EV->longitude,
            "latitude" => $EV->latitude,
            "event_catergory_id" => $EV->event_catergory_id,
            "eventCatergoryName" => $EV->eventCatergoryName,
            "event_organized_id" => $EV->event_organized_id,
            "eventOrganizedName" => $EV->eventOrganizedName,
            "temple_id" => $EV->temple_id,
            "templeName" => $EV->templeName,

            'ehp' => $EHP,
            'ei' => $EI,

        ];

        $JsonRes=[
            "message" => "Find one Temple Event",
            "status" => 200,
            "response" => $res,
        ];
        return response()->json($JsonRes, 200);

//        return response()->json(["message"=>"Find one Temple Event","response"=>$res],200);
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


            'eventName' => 'required|min:1|max:45',
            'eventInfo' => 'required|min:1|max:345',
            'eventDateFrom' => 'required',
            'eventDateTo' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'event_catergory_id' => 'required|numeric',
            'phone_number' => 'required|numeric',


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

            $eventName = $request->eventName;
            $eventInfo = $request->eventInfo;
            $eventDateFrom = $request->eventDateFrom;
            $eventDateTo = $request->eventDateTo;
            $eventIsActive = false;
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $event_catergory_id = $request->event_catergory_id;
            $phoneName = $request->phone_number;
            $event_organized_id =DefaultData::$EVENT_ORGANIZATION_TEMPLE;
            $isApproved =false;



            $EV = Event::find($id);

            $EV->eventName = $eventName;
            $EV->eventInfo = $eventInfo;
            $EV->eventDateFrom= $eventDateFrom;
            $EV->eventDateTo= $eventDateTo;
            $EV->longitude= $longitude;
            $EV->latitude= $latitude;
            $EV->event_catergory_id = $event_catergory_id;
            $EV->event_organized_id = $event_organized_id;
            $EV->isApproved = $isApproved ;
            $EV->update();

            $EHP = EventHasPhone::where('event_id',$id)
                ->first();

            if($EHP) {
                $PN = Phone::find($EHP->phone_id);
                $PN->phoneName = $phoneName;
                $PN->update();
            }else{
                $isPrimary=false;

                $PN = new Phone();
                $PN->phoneName = $phoneName ;
                $PN->isPrimary = $isPrimary ;
                $PN->save();

                $TMHP = new EventHasPhone();
                $TMHP ->phone_id = $PN -> id;
                $TMHP ->event_id = $EV->id;
                $TMHP ->save();
            }


            $JsonRes=[
                "message" => "Successfully Update Temple Event",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);

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
//        Event:: where('eventIsActive','isApproved',1)
//            -> where('id',$id)
//            -> delete();
//
////        return response()->json(["message"=>"Delete Event "],200);
//        $JsonRes=[
//            "message" => "Delete Event",
//            "status" => 200,
//            "response" => "",
//        ];
//        return response()->json($JsonRes, 200);




        {
            $eventIsActive= false;

            $EV = Event::find($id);
            $EV->eventIsActive= $eventIsActive;
            $EV->update();

            $JsonRes=[
                "message" => "Delete Event",
                "status" => 200,
                "response" => "",
            ];
            return response()->json($JsonRes, 200);
//        return response()->json(["message"=>"Delete News "],200);
        }
    }




}
