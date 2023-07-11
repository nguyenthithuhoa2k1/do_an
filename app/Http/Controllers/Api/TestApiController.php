<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Api;

class TestApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $dataBlog = Blog::orderBy('created_at', 'DESC')->paginate(3);;
       
        // dd($getBlogListComment);
        // co dc 1 arr: 

        // frontend: reactjs
        // return view("xxx", compact('getBlogListComment'))

        // ajax
        return response()->json([
            'blog' => $dataBlog,
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function insert(Request $request)
    {
        $datablog = new Api;
        $datablog->name = $request->name;
        $datablog->title = $request->title;
        
        if($datablog->save()){
            return response()->json([
                'status'=>'200',
                'success'=>'insert success'

            ]);
        }else{
            return response()->json([
                'status'=>'404',
                'success'=>'insert found'
            ]);
        }
    
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $dataApi = Api::where('id',$id)->get();
        if($dataApi){
            return response()->json([
                'status'=>'200',
                'success'=>'show success',
                'dataApi'=>$dataApi,
            ]);
        }else{
            return response()->json([
                'status'=>'404',
                'success'=>'show found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataApi = Api::where('id',$id);
        if($dataApi){
            if($request){
                $dataApi->update([
                'name'=>$request->name,
                'title'=>$request->title,
            ]);
            return response()->json([
                'status'=>'200',
                'success'=>'update success'
            ]);
            }
        }else{
          return response()->json([
                'status'=>'404',
                'success'=>'update found'
            ]);  
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dataApi = Api::where('id',$id);
        if($dataApi){
            $dataApi->delete();
            return response()->json([
                'status'=>'200',
                'success'=>'delete success'
            ]);
        }else{
            return response()->json([
                'status'=>'200',
                'success'=>'delete erros'
            ]);
        }
    }
}
