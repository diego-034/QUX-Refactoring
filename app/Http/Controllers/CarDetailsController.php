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
     * Crear un nuevo registro de detalles del carrito en la DB
     *
     * @param  \Illuminate\Http\Request  $request o peticion http
     * @return \Illuminate\Http\Response Utilizamos Redirect para retornar una 
     *                                   accion de redireccion  a otra pestaña
     *                                      
     */
    public function store(Request $request)
    {
        try {
            /**
             * Creamos un objeto de CarsController y llamamos el metodo
             * store para crear un carrito en la base de datos
             */
            $carController = new CarsController();
            $carController->store($request);
            /**
             * Obteneos el request y añadimos campos estaticos para poder 
             * registrar en DB
             */
            $input = $request->all();
            $input['discount'] = 0;
            $input['total'] = 0;
            $input['iva'] = 0;
            /**
             * Obtenemos el carrito ya creado que se guardo es la session token-car
             * y seteamos el id del carrito de $input
             */
            $car = $request->session()->get('token-car');
            $input['car_id'] = $car->id;
            /**
             * Creamos el carrito con el metodo estatico create()
             * Respondemos y redireccionamos
             */
            $data = CarDetails::create($input);
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
