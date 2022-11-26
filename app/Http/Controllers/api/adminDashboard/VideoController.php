<?php

namespace App\Http\Controllers\api\adminDashboard;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\VideoResource;
use App\Http\Controllers\api\BaseController as BaseController;
class VideoController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $success['videos']=VideoResource::collection(Video::where('is_deleted',0)->get());
        $success['status']= 200;

         return $this->sendResponse($success,'تم ارجاع الفيديوهات بنجاح','videos return successfully');
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
        $input = $request->all();
        $validator =  Validator::make($input ,[
            'video'=>'required|mimes:mp4,ogx,oga,ogv,ogg,webm',

            'unit_id' =>'required|exists:units,id'


        ]);
        if ($validator->fails())
        {
            return $this->sendError(null,$validator->errors());
        }
        $video = Video::create([
            'video' => $request->video,

            'unit_id'=>$request->unit_id,

          ]);

         // return new CountryResource($country);
         $success['videos']=New VideoResource($video);
        $success['status']= 200;

         return $this->sendResponse($success,'تم إضافة فيديو بنجاح','video Added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show($video)
    {
          $video = Video::query()->find($video);
         if ($video->is_deleted == 1){
         return $this->sendError("الوحدة غير موجودة","video is't exists");
         }


        $success['$videos']=New VideoResource($video);
        $success['status']= 200;

         return $this->sendResponse($success,'تم عرض بنجاح','video showed successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
     {
         if ($video->is_deleted==1){
         return $this->sendError("الوح\ة غير موجودة","video is't exists");
          }
         $input = $request->all();
         $validator =  Validator::make($input ,[
         'title'=>'required|string|max:255',
            'file'=>'mimes:pdf,doc,excel',
             'course_id' =>'required|exists:courses,id'
         ]);
         if ($validator->fails())
         {
            # code...
            return $this->sendError(null,$validator->errors());
         }
         $video->update([
            'title' => $request->input('name'),
            'file' => $request->input('file'),
             'course_id' => $request->input('course_id'),

         ]);
         //$country->fill($request->post())->update();
            $success['videos']=New VideoResource($video);
            $success['status']= 200;

            return $this->sendResponse($success,'تم التعديل بنجاح','video updated successfully');
        }

  public function changeStatus($id)
    {
        $video = Video::query()->find($id);
         if ($video->is_deleted==1){
         return $this->sendError("الفيديو غير موجودة","video is't exists");
         }

        if($video->status === 'active'){
        $video->update(['status' => 'not_active']);
        }
        else{
        $video->update(['status' => 'active']);
        }
        $success['$videos']=New VideoResource($video);
        $success['status']= 200;

         return $this->sendResponse($success,'تم تعديل حالة الفيديو بنجاح','video updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
