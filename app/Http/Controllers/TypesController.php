<?php

namespace App\Http\Controllers;

use App\Types;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Redirect;
use App\User;


class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function show(Types $types, $id)
    {
        try {
            //Consultamos por id los datos mencionadoa abajo
            
                $product =  User::find($id);
            //Respondemos con los datos consultados
            return view('configUser')->with('response', $product);
        } catch (Exception $ex) {
            return Redirect::action('HomeController@index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function edit(Types $types)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Types $types)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Types  $types
     * @return \Illuminate\Http\Response
     */
    public function destroy(Types $types)
    {
        //
    }
}
