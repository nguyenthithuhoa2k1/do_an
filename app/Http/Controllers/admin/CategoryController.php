<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCategory = Category::paginate(5);
        return view('admin.category.Category',compact('dataCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.AddCategory');
    }

    public function insert(CategoryRequest $request)
    {
       $dataCategory = new Category;
       $dataCategory->category = $request->category;
       $dataCategory->save();
       return redirect()->route('category');
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
        $dataCategory =Category::where('id',$id)->get();
        return view('admin.category.EditCategory',compact('dataCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataCategory =Category::where('id',$id);
        if($dataCategory->update([
            'category'=>$request->category,
        ])){
            return redirect()->route('category')->with('success','update success');
        }else{
            return redirect()->route('category')->withErrors('update errors');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Category::where('id',$id)->delete()){
           return redirect()->route('category')->with('success','delete success');
        }else{
            return redirect()->route('category')->withErrors('delete errors');
        }
    }
}
