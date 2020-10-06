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
     * Función generate que crea token aleatorio
     * para identificar el carrito
     *
     * @param   Integer $size Integer con la lognitud deseada del token
     * @return  String $token String con el token
     */
    public function generate($size)
    {
        if ($size < 4) {
            $size = 4;
        }

        return bin2hex(random_bytes(($size - ($size % 2)) / 2));
    }

    /**
     * Metodo para crear el carrito
     *
     * @param  \Illuminate\Http\Request  $request que viene de CarDetailsController
     */
    public function store(Request $request)
    {
        try {
            /**
             * Validacion de si ya existe una sesion con token adentro
             * para no crear una nueva sesion con un nuevo token
             */
            if ($request->session()->exists('token-car')) {
                return;
            }
            /**
             * Llamado a la funcion generate();
             */
            $token = $this->generate(30);
            /**
             * Seteo de campo token en $input
             * creacion de Carrito con metodo estatico store()
             * creacion de la session 'token-car' 
             */
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
     * Mostrar carrito con todos sus detalles de carrito o items del carrito
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        try {
            /**
             * Validacion de si existe una sesion de carrito ya creada
             */
            $response = null;
            if ($request->session()->exists('token-car')) {
                /**
                 * si ya existe consultamos los datos de la DB
                 * Datos = (Carrito, Items Agregados al carrito)
                 * Devolvemos a la vista con la variable $response
                 */
                $car =  $request->session()->get('token-car');

                $products =  DB::table('car_details')->join(
                    'products',
                    'car_details.product_id',
                    '=',
                    'products.id'
                )->select([
                    'products.*',
                    'car_details.*'
                ])->where('car_details.car_id', '=', $car->id)->get();

                $cars = DB::table('cars')
                    ->select('*')
                    ->where('token', '=', $car->token)->get();
                $response = [
                    "car" => $cars,
                    "products" => $products
                ];
            }
            /**
             * Se retorna la vista con la variable $response 
             * para usarla en la vista
             */
            return view('shoppingCar')->with('response', $response);
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Actualiza rel carrito de compras
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cars  $Cars Modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cars $cars, $id)
    {
        try {
            /**
             * NOTA: Esta parte esta en desarrollo aún IMPORTANTE
             */
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
     * Eliminar el carrito
     *
     * @param  \App\Cars  $Cars
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cars $cars, $id)
    {
        /**
         * NOTA: Esta parte esta en desarrollo aún IMPORTANTE
         */
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
