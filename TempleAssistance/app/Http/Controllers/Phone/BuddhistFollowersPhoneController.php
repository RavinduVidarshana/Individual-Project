<?php

namespace App\Http\Controllers\Phone;

use App\Model\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Validator;
class BuddhistFollowersPhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PN = Phone:: get();

        return response()->json(["message"=>"Find all BuddhistFollowers Phone Numbers","status"=>$PN],200);
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

            'phoneName' => 'required|min:1|max:15',

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary =false;


            $PN = new Phone();
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->save();

            return response()->json(["message"=>"Successfully Insert BuddhistFollowers Phone Number"],200);

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
        $PN = Phone :: where('isPrimary',0)
            -> where('id',$id)
            -> first();

        return response()->json(["message"=>"Find one BuddhistFollowers Phone","status"=>$PN],200);
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

            'phoneName' => 'required|min:1|max:15',

        ];
        $validator = Validator::make(
            $request->all(), $rule
        );

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);

        } else {
            $phoneName = $request->phoneName;
            $isPrimary =false;


            $PN = Phone::find($id);
            $PN->phoneName = $phoneName ;
            $PN->isPrimary = $isPrimary ;
            $PN->update();

            return response()->json(["message"=>"Successfully Update BuddhistFollowers Phone Number"],200);

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
        $PN = Phone:: where('isPrimary',0)
            -> where('id',$id)
            -> delete();

        return response()->json(["message"=>"Delete BuddhistFollowers Phone Number "],200);
    }
}
