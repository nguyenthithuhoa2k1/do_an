<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Product;
use App\Models\Brand;
use App\Models\Category;
use Session;

class SearchAdvancedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $dataBrand = Brand::all();
        $dataCategory = Category::all();
        $dataProduct=[];

        if ($request->isMethod('post'))
        {
            $query = Product::query();

            if (isset($request->name)) {
               $query->where('title','like','%'.$request->name.'%');
            }

            if (isset($request->price)) {
                if($request->price == 500){
                   $query->whereBetween('price',[500 , 1000]);
                }else{
                    $query->whereBetween('price',[1000 , 50000 ]);
                }
            }

            if (isset($request->category)) {
                $query->where('id_category',$request->category);
            }

            if (isset($request->brand)) {
                $query->where('id_brand',$request->brand);
            }

            if (isset($request->status)) {
                $query->where('status',$request->status);
            }

            $dataProduct = $query->orderBy('id_product')->paginate(10);
        }
        
        return view('frontend.search.SearchAdvanced',compact('dataBrand','dataCategory','dataProduct'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
