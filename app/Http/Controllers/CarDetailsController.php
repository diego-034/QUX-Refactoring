<?php

namespace App\Http\Controllers;

use App\CarDetails;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class CarDetailsController extends Controller
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
            $carController= new CarsController();
            $carController->store($request);
            //validaciones de seguridad
            // $validator = Validator::make($request->all(), [
            //     'quantity' => 'required|numeric',
            //     'product_id' => 'string',
            //     //'discount' => 'required|numeric',
            //     //'total' => 'required|numeric',
            //     //'price' => 'required|numeric',
            //     //'IVA' => 'required|numeric',
            //     //'discount' => 'required|numeric',
            //     //'Estado' => 'required|boolean',
            //     'size' => 'string'
            // ]);
            //Respuesta de validacion
            // if ($validator->fails()) {
            //     //return Redirect::action('ProductsController@index');
            // }
            $input = $request->all();

            //$input['car_id'] = Request::ip();
            $input['discount'] = 0;
            $input['total'] = 0;
            $input['iva'] = 0;
            $car = $request->session()->get('token-car');
            $input['car_id'] = $car->id;
            //Se crea el registro en la base de datos
            $data = CarDetails::create($input);
            //Respondemos y redireccionamos
            return Redirect::action('ProductsController@index');
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarDetails  $carDetails
     * @return \Illuminate\Http\Response
     */
    public function show(CarDetails $carDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarDetails  $carDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(CarDetails $carDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarDetails  $carDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarDetails $carDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarDetails  $carDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarDetails $carDetails)
    {
        //
    }
}
