<?php

namespace App\Http\Controllers\Event;

use App\ExtraData\DefaultData;
use App\Model\Event;
use App\Model\EventHasPhone;
use App\Model\EventImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;

class DhammaSchoolEventController extends Controller
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
            ->join('dhamma_school','dhamma_school.id','=','event.dhamma_school_id')
            ->where('event.event_organized_id',DefaultData::$EVENT_ORGANIZATION_DHAMMA_SCHOOL)
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
                'dhamma_school.id as dhamma_school_id',
                'dhamma_school.dhammaSchoolName')
            -> get();
        $EVARY=array();
        foreach ($EV as $item){
            $EHP = EventHasPhone::join('phone','event_has_phone.phone_id','=','phone.id')
                ->select('phone.id as id','phone.phoneName','phone.isPrimary')
                ->where('event_has_phone.event_id',$item->id)
                ->get();

            $EI = EventImage::where('event_id',$item->id)
                ->get();

            $res = [
                'ehp' => $EHP,
                'ei' => $EI,
                "event_id" => $item->id,
                "eventName" => $item->eventName,
                "eventInfo" => $item->eventInfo,
                "eventDateFrom'" => $item->eventDateFrom ->format('d-m-Y'),
                "eventDateTo" => $item->eventDateTo ->format('d-m-Y'),
                "eventIsActive" => $item->eventIsActive,
                "longitude" => $item->longitude,
                "latitude'" => $item->latitude,
                "event_catergory_id" => $item->event_catergory_id,
                "eventCatergoryName" => $item->eventCatergoryName,
                "event_organized_id" => $item->event_organized_id,
                "eventOrganizedName" => $item->eventOrganizedName,
                "dhamma_school_id" => $item->dhamma_school_id,
                "dhammaSchoolName" => $item->dhammaSchoolName,

            ];

            array_push($EVARY,$res);
        }

        return response()->json(["message"=>"Find all Dhamma School Events","status"=>$EVARY],200);

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
            'eventDateFrom' => 'required|date_format:Y-m-d|after:today',
            'eventDateTo' => 'required|date_format:Y-m-d|after:today',
            'longitude' => 'required',
            'latitude' => 'required',
            'event_catergory_id' => 'required|numeric',
            'dhamma_school_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {

            $eventName = $request->eventName;
            $eventInfo = $request->eventInfo;
            $eventDateFrom = $request->eventDateFrom;
            $eventDateTo = $request->eventDateTo;
            $eventIsActive = false;
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $event_catergory_id = $request->event_catergory_id;
            $event_organized_id =DefaultData::$EVENT_ORGANIZATION_DHAMMA_SCHOOL;
            $dhamma_school_id = $request->dhamma_school_id;
            $isApproved =false;



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
            $EV->dhamma_school_id = $dhamma_school_id;
            $EV->isApproved = $isApproved ;
            $EV->save();

            return response()->json(["message"=>"Successfully Insert Dhamma School Event"],200);

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
            ->join('dhamma_school','dhamma_school.id','=','event.dhamma_school_id')
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
                'dhamma_school.id as dhamma_school_id',
                'dhamma_school.dhammaSchoolName')
            -> first();

        $EHP = EventHasPhone::join('phone','event_has_phone.phone_id','=','phone.id')
            ->select('phone.id as id','phone.phoneName','phone.isPrimary')
            ->where('event_has_phone.event_id',$id)
            ->get();

        $EI = EventImage::where('event_id',$id)
            ->get();

        $res = [
            'ehp' => $EHP,
            'ei' => $EI,
            "event_id" => $EV->id,
            "eventName" => $EV->eventName,
            "eventInfo" => $EV->eventInfo,
            "eventDateFrom'" => $EV->eventDateFrom ->format('d-m-Y'),
            "eventDateTo" => $EV->eventDateTo ->format('d-m-Y'),
            "eventIsActive" => $EV->eventIsActive,
            "longitude" => $EV->longitude,
            "latitude'" => $EV->latitude,
            "event_catergory_id" => $EV->event_catergory_id,
            "eventCatergoryName" => $EV->eventCatergoryName,
            "event_organized_id" => $EV->event_organized_id,
            "eventOrganizedName" => $EV->eventOrganizedName,
            "dhamma_school_id" => $EV->dhamma_school_id,
            "dhammaSchoolName" => $EV->dhammaSchoolName,

        ];

        return response()->json(["message"=>"Find one Dhamma School Event","response"=>$res],200);
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
            'eventDateFrom' => 'required|date_format:Y-m-d|after:today',
            'eventDateTo' => 'required|date_format:Y-m-d|after:today',
            'longitude' => 'required',
            'latitude' => 'required',
            'event_catergory_id' => 'required|numeric',


        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {

            $eventName = $request->eventName;
            $eventInfo = $request->eventInfo;
            $eventDateFrom = $request->eventDateFrom;
            $eventDateTo = $request->eventDateTo;
            $eventIsActive = false;
            $longitude = $request->longitude;
            $latitude = $request->latitude;
            $event_catergory_id = $request->event_catergory_id;
            $event_organized_id =DefaultData::$EVENT_ORGANIZATION_DHAMMA_SCHOOL;
            $isApproved =false;



            $EV = Event::find($id);

            $EV->eventName = $eventName;
            $EV->eventInfo = $eventInfo;
            $EV->eventDateFrom= $eventDateFrom;
            $EV->eventDateTo= $eventDateTo;
            $EV->eventIsActive =$eventIsActive;
            $EV->longitude= $longitude;
            $EV->latitude= $latitude;
            $EV->event_catergory_id = $event_catergory_id;
            $EV->event_organized_id = $event_organized_id;
            $EV->isApproved = $isApproved ;
            $EV->update();

            return response()->json(["message"=>"Successfully Insert Dhamma School Event"],200);

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
        Event:: where('eventIsActive','isApproved',1)
            -> where('id',$id)
            -> delete();

        return response()->json(["message"=>"Delete Event "],200);
    }
}
