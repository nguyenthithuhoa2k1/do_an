<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Http\Requests\BrandRequest;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataBrand = Brand::paginate(5);
        return view('admin.brand.Brand',compact('dataBrand'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.AddBrand');
    }

    public function insert(BrandRequest $request)
    {
       $dataBrand = new Brand;
       $dataBrand->brand = $request->brand;
       if($dataBrand->save()){
        return redirect()->route('brand')->with('success','insert success');
       }else{
        return redirect()->route('brand')->withErrors('insert errors');
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
        $dataBrand =Brand::where('id',$id)->get();
        return view('admin.brand.EditBrand',compact('dataBrand'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataBrand =Brand::where('id',$id);
        if($dataBrand->update([
            'brand'=>$request->brand,
        ])){
            return redirect()->route('brand')->with('success','update success');
        }else{
            return redirect()->route('brand')->withErrors('update errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Brand::where('id',$id)->delete()){
           return redirect()->route('brand')->with('success','delete success');
        }else{
            return redirect()->route('brand')->withErrors('delete errors');
        }
    }
}
