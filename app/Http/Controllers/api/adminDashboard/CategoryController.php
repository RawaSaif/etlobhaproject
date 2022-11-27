<?php

namespace App\Http\Controllers\api\adminDashboard;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\api\BaseController as BaseController;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $success['categories']=CategoryResource::collection(Category::where('is_deleted',0)->get());
        $success['status']= 200;

         return $this->sendResponse($success,'تم ارجاع جميع التصنيفات بنجاح','categories return successfully'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if($request->parent_id == null){
            $input = $request->all();
            $validator =  Validator::make($input ,[
                'name'=>'required|string|max:255',
                'icon'=>['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
                'for'=>'required',
            ]);
            if ($validator->fails())
            {
                return $this->sendError(null,$validator->errors());
            }
            $category =Category::create([
                'name' => $request->name,
                'number'=> str_pad($request->id, 4, '0', STR_PAD_LEFT),
                'icon' => $request->icon,
                'parent_id'=>$request->parent_id,
                'for'=>$request->for,
                'store_id'=> $request->store_id,
              ]);
              
        }
        else{
    }
    $success['categories']=New CategoryResource($category );
    $success['status']= 200;

     return $this->sendResponse($success,'تم إضافة التصنيف بنجاح','Category Added successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}