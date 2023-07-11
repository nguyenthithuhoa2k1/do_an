<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataCountry = Country::paginate(10);
        return view('admin.country.Country',compact('dataCountry'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.country.AddCountry');
    }

    public function insert(Request $request)
    {
        $newCountry = new Country;
        $newCountry->name_country=$request->name_country;
        if( $newCountry->save()){
            return redirect()->route('country')->with('success','create success.');
        }else{
            return redirect()->route('country')->withErrors('create errors.');
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
        $getCountry=country::where('id_country',$id)->get();
        return view('admin.country.EditCountry',compact('getCountry'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::where('id_country',$id);
         if($country->update(['name_country'=>$request->name_country])){
            return redirect()->route('country')->with('success','update success.');
        }else{
            return redirect()->route('country')->withErrors('update errors.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        


        $country = Country::where('id_country',$id);
         if($country->delete()){
            return redirect()->route('country')->with('success','delete success.');
        }else{
            return redirect()->route('country')->withErrors('delete errors.');
        }
    }
}
