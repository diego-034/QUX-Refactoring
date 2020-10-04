<?php

namespace App\Http\Controllers;

use App\Invoices;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class InvoicesController extends Controller
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
            $products = Invoices::all();
            //Retornar vista con datos en variable $response
            return view('home')->with('response', $products);
        } catch (Exception $ex) {
            return view('home')->with('response', null);
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
                'total' => 'required|numeric',
                //'Imagen' => 'string',
                'total_discount' => 'required|numeric',
                'total_iva' => 'required|numeric',
                'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                'discount' => 'required|numeric',
                //'Estado' => 'required|boolean',
                'client_id' => 'numeric'
            ]);
            //Respuesta de validacion
            if ($validator->fails()) {
                return Redirect::action('InvoicesController@index');
            }
            $input = $request->all();

           
            $input['user_id'] = 1;
            //Se crea el registro en la base de datos
            $data = Invoices::create($input);
            //Respondemos y redireccionamos
            return Redirect::action('InvoicesController@index');
        } catch (Exception $ex) {
            return Redirect::action('InvoicesController@index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices,$id)
    {
        try{
            $invoice = Invoices::find($id);
            return view('invocie')->with('response', $invoice);
           }catch(Exception $ex){
            return Redirect::action('InvoicesController@index');
           }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices)
    {
        //
    }
}
