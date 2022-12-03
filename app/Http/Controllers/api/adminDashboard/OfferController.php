<?php

namespace App\Http\Controllers\api\adminDashboard;

use App\Models\Offer;
use Illuminate\Http\Request;
use App\Http\Resources\OfferResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController as BaseController;

class OfferController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
      {
        $success['offers']=OfferResource::collection(Offer::where('is_deleted',0)->get());
        $success['status']= 200;

         return $this->sendResponse($success,'تم ارجاع العروض بنجاح','offers return successfully');
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
            'offer_type'=>'required|string',
            'offer_title'=>'required|string',
            'offer_view' =>'required|string',
            'start_at'=>'required|string',
            'end_at'=>'required|string',
            'purchase_quantity' =>'required|string',
            'purchase_type' =>'required|string',
            'get_quantity' =>'required|string',
            'offer1_type' =>'required|string',
            'discount_percent' =>'required|string',
             'discount_value_offer2' =>'required|string',
            'offer_apply' =>'required|string',
             'offer_type_minimum' =>'required|string',
             'offer_amount_minimum' =>'required|string',
              'coupon_status' =>'required|string',
             'discount_value_offer3' =>'required|string',
            'maximum_discount' =>'required|string',

        ]);
        if ($validator->fails())
        {
            return $this->sendError(null,$validator->errors());
        }
        $explainvideos = ExplainVideos::create([
            'title' => $request->title,
            'video'=>$request->video,
            'thumbnail' =>$request->thumbnail,
            'user_id' => $request->user_id,
          ]);

         // return new CountryResource($country);
         $success['explainvideos']=New ExplainVideoResource($explainvideos);
        $success['status']= 200;

         return $this->sendResponse($success,'تم إضافة فيديو بنجاح','video Added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        //
    }
}
