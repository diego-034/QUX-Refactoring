<?php

namespace App\Http\Controllers;

use App\Invoices;
use App\InvoiceDetails;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

class InvoicesController extends Controller
{
    /**
     * Constructor con middleware de autenticacion
     * para denegar el accesso a usuarios no logueados
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostrar todas las facuturas
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            /**
             * Obtener datos con Model::all();
             * */
            $invoices = Invoices::all();
            /**
             * Retornar vista con datos en variable $response
             */
            return view('crudBill')->with('response', $invoices);
        } catch (Exception $ex) {
            return view('crudBill')->with('response', null);
        }
    }

    /**
     * Crear una nueva factura obteniendola de la session 'token-car'
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            if ($request->session()->exists('token-car')) {
                $invoice =  $request->session()->get('token-car');
                $invoice['user_id'] = 1;
                $invoice['client_id'] = Auth::id();
                $data = Invoices::create([]);
                $products =  DB::table('car_details')
                    ->select(['*'])
                    ->where('car_id', '=', $invoice->id)->get();

                // foreach ($products as $product) {
                //     $product['invoice_id'] = $data->id;
                //     InvoiceDetails::create($product);
                // }
                
            }

            /**
             * Respondemos y redireccionamos
             */
            return Redirect::action('InvoicesController@index');
        } catch (Exception $ex) {
            return Redirect::action('InvoicesController@index');
        }
    }

    /**
     * Mostrar una factura en especifico y ssu detalles de factura
     *
     * @param  \App\Invoices  $invoices
     * @param  Integer  $id identificador de factura o PK pasado por url
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices, $id)
    {
        try {
            $response = null;
            $invoice = Invoices::find($id);
            if ($invoice != null) {
                /**
                 * Consultamos los datos a DB con Eloquent(Si no sabe que es, busque)
                 */
                $products =  DB::table('invoice_details')->join(
                    'products',
                    'invoice_details.product_id',
                    '=',
                    'products.id'
                )->select([
                    'products.*',
                    'invoice_details.*'
                ])->where('invoice_details.invoice_id', '=', $invoice->id)->get();
                $response = [
                    "invoice" => $invoice,
                    "products" => $products
                ];
            }


            return view('editBill')->with('response', $response);
        } catch (Exception $ex) {
            return Redirect::action('InvoicesController@index');
        }
    }

    /**
     * Esto esta en desarrollo
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoices $invoices, $id)
    {
        // try {

        //     $invoices = Invoices::find($id);
        //     if ($invoices == null) {
        //         return Redirect::action('InvoicesController@index');
        //     }
        //     //Validaciones 
        //     $validator = Validator::make($request->all(), [
        //         'total' => 'required|numeric',
        //         //'Imagen' => 'string',
        //         'total_discount' => 'required|numeric',
        //         'total_iva' => 'required|numeric',
        //         'price' => 'required|numeric',
        //         //'IVA' => 'required|numeric',
        //         'discount' => 'required|numeric',
        //         //'Estado' => 'required|boolean',
        //         'client_id' => 'numeric'
        //     ]);

        //     if ($validator->fails()) {
        //         return Redirect::action('InvoicesController@index');
        //     }

        //     $invoices->total = $request->get("total");
        //     $invoices->total_discount = $request->get("total_discount");
        //     $invoices->total_iva = $request->get("total_iva");
        //     $invoices->price = $request->get("price");
        //     $invoices->discount = $request->get("discount");
        //     $invoices->client_id = $request->get("client_id");
        //     $invoices->save();
        //     //Respuesta a vista redirect
        //     return Redirect::action('InvoicesController@index');
        // } catch (Exception $ex) {
        //     return Redirect::action('InvoicesController@index');
        // }
    }

    /**
     * Eliminar una factura en especifico
     *
     * @param  \App\Invoices  $invoices
     * @param  Integer $id el Identificador de la factura por url
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices, $id)
    {
        try {
            /**
             * Se consulta a DB con find()
             * Se devuleve resultados y 
             * redirecciona a vista
             */
            $invoices = Invoices::find($id);
            if ($invoices == null) {
                return Redirect::action('InvoicesController@index');
            }
            Invoices::destroy($invoices['id']);
            return Redirect::action('InvoicesController@index');
        } catch (Exception $ex) {
            return Redirect::action('InvoicesController@index');
        }
    }
}
