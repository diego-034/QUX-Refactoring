<?php

namespace App\Http\Controllers;

use Exception;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //Obtener datos con Model::all();
            $products = Products::all();
            //Retornar vista con datos en variable $response
            return view('products')->with('response', $products);
        } catch (Exception $ex) {
            return view('products')->with('response', null);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //validaciones de seguridad
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                //'Imagen' => 'string',
                'description' => 'required|string',
                'color' => 'required|string',
                'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                'discount' => 'required|numeric',
                //'Estado' => 'required|boolean',
                'size_s' => 'numeric',
                'size_m' => 'numeric',
                'size_l' => 'numeric'
            ]);
            if ($validator->fails()) {
                return Redirect::action('ProductsController@index');
            }
            $input = $request->all();

            $input['image']="Ruta";
            $input['iva']= 0;
            $input['state']= 1;

            $data = Products::create($input);

            return Redirect::action('ProductsController@index');
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products,$id)
    {
        try {

            $product = DB::table('products')
            ->select('id', 'name',
            'description','color','price','iva',
            'dicount','size_s','size_m','size_l','state')
            ->where('id', '=', $id)->get();
           
            return view('products')->with('response', $product);
        } catch (Exception $ex) {
            return view('products')->with('response', null);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
