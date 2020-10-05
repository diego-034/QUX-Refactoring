<?php

namespace App\Http\Controllers;

use App\Cars;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CarsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function generate($size)
    {
        if ($size < 4) {
            $size = 4;
        }

        return bin2hex(random_bytes(($size - ($size % 2)) / 2));
    }

    public function store(Request $request)
    {
        try {
            if ($request->session()->exists('token-car')) {
                return;
            }
            $token = $this->generate(30);

            $input = [];
            $input['token'] = $token;
            $data = Cars::create($input);
            $request->session()->put('token-car',  $data);


            return;
        } catch (Exception $ex) {
            return;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            $response = null;
            if ($request->session()->exists('token-car')) {
                $car =  $request->session()->get('token-car');
                $cars = DB::table('cars')
                ->select('*')
                ->where('token', '=', $car->token)->get();
                $response= [
                "car" => $cars,
                "products"=> DB::table('car_details')
                ->select('*')
                ->where('car_id', '=', $car->id)->get()
            ];
            }
            
            return view('shoppingCar')->with('response', $response);
        } catch (Exception $ex) {
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
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars, $id)
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
