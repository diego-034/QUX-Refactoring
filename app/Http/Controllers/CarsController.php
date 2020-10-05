<?php

namespace App\Http\Controllers;

use App\Cars;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CarsController extends Controller
{
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
                'total' => 'required|numeric',
                //'Imagen' => 'string',
                //'total_discount' => 'required|numeric',
                //'total_iva' => 'required|numeric',
                //'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                //'discount' => 'required|numeric',
                //'Estado' => 'required|boolean',
                //'client_id' => 'numeric'
            ]);
            //Respuesta de validacion
            if ($validator->fails()) {
                return Redirect::action('CarsController@index');
            }
            $input = $request->all();

            $input['client_id'] = Request::ip();
            $input['user_id'] = 1;
            //Se crea el registro en la base de datos
            $data = Cars::create($input);
            //Respondemos y redireccionamos
            return Redirect::action('CarsController@index');
        } catch (Exception $ex) {
            return Redirect::action('CarsController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function show(Cars $Cars,$id)
    {
        try{
            $cars = Cars::find($id);
            return view('shoppingCar')->with('response', $cars);
           }catch(Exception $ex){
            return Redirect::action('ProductsController@index');
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $cars, $id)
    {
        try {

            $cars = Cars::find($id);
            if ($cars == null) {
                return Redirect::action('CarsController@index');
            }
            //Validaciones 
            $validator = Validator::make($request->all(), [
                //'total' => 'required|numeric',
                //'Imagen' => 'string',
                //'total_discount' => 'required|numeric',
                //'total_iva' => 'required|numeric',
                //'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                //'discount' => 'required|numeric',
                //'Estado' => 'required|boolean',
                //'client_id' => 'numeric'
            ]);

            if ($validator->fails()) {
                return Redirect::action('ProductsController@index');
            }  
            
            $cars->total = 0;
            $cars->total_discount = 0;
            $cars->total_iva = 0;
            $cars->price = 0;
            $cars->discount = 0;
            $cars->client_id = Request::ip();    
            $cars->save();
            //Respuesta a vista redirect
            return Redirect::action('ProductsController@index');
        }catch(Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars,$id)
    {
        try {
            $cars = Cars::find($id);
            if ($cars == null) {
                return Redirect::action('ProductsController@index');
            }
            Cars::destroy($cars['id']);
            return Redirect::action('ProductsController@index');
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }
}
