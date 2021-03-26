<?php

namespace App\Http\Controllers\Manage;

use App\Model\News;
use App\Model\NewsImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $NS = News ::join('temple','news.temple_id','=','temple.id')
            ->select('news.id as id','news.title','news.description','news.publishDate','news.isActive','temple.id as temple_id','temple.templeName')
            ->get();


        $NSARY=array();
        foreach ($NS as $item){
            $NSI = NewsImage::join('news','news_image.news_id','=','news.id')
                ->where('news_image.id','=',$item->id)
                ->select('news_image.id as id','news_image.imageUrl')
                ->get();

            $res = [
                'id' =>$item ->id,
                'title'=>$item->title,
                'description'=>$item->description,
                'publishDate'=>$item->publishDate,
                'isActive' => $item->isActive,

                'temple_id'=>$item->temple_id,
                'templeName'=>$item->templeName,

                'NSI' => $NSI

            ];

            array_push($NSARY,$res);
        }



        return response()->json(["message" => "Success","response "=>$NSARY], 200);
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
        $NS = News ::join('temple','news.temple_id','=','temple.id')
            ->select('news.id as id','news.title','news.description','news.publishDate','news.isActive','temple.id as temple_id','temple.templeName')
            ->first();

        $NSI = NewsImage::join('news','news_image.news_id','=','news.id')
            ->where('news_image.id','=',$id)
            ->select('news_image.id as id','news_image.imageUrl')
            ->get();
        $res = [
            'id' =>$NS ->id,
            'title'=>$NS->title,
            'description'=>$NS->description,
            'publishDate'=>$NS->publishDate,
            'isActive' => $NS->isActive,

            'temple_id'=>$NS->temple_id,
            'templeName'=>$NS->templeName,

            'NSI' => $NSI

        ];
        return response()->json(["message" => "Success","response "=>$res], 200);
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
        $NS = News::find($id);
        $approved_status=$NS->isApproved;
        $NS->isApproved=!$approved_status;
        $NS->update();

        return response()->json(["message" => "Status changed" ], 200);
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
