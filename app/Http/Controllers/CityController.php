<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
    }

    public function index()
    {
        //
        $data = DB::table('city')
        ->join('country', 'city.country_id', '=', 'country.country_id')
        ->paginate(6);
        return view('city.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $countries = Country::all();
        return view('city.create', compact('countries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name_city');
        $id_country = $request->input('country');
        $request->validate([
            'name_city' => 'required',
            'country' => 'required',
        ], [
            'name_city.required' => 'El Nombre es requerido'
        ]);
        
        $city = new City;
        $city->city = $name;
        $city->country_id = $id_country;
        if($city->save())
            Session::flash('message', 'Ciudad Agregada Correctamente');
        return redirect()->action('CityController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $city = DB::table('city')
        ->join('country', 'city.country_id', '=', 'country.country_id')
        ->where('city.city_id', '=', "$city->city_id")->first();
        return view('city.show', compact('city'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('city.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $request->validate(
          ['city' => 'required'], 
          ['city.required' => 'El nombre es requerido!']
        );
        $city->city = $request->input('city');
        $city->update();
        Session::flash('message', 'Actualizado Correctamente');
        return redirect()->route('city.edit',$city);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
        $city->delete();
        Session::flash('message', 'Eliminado Correctamente!');
        return redirect()->action('CityController@index');
    }
}
