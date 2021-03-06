<?php

namespace App\Http\Controllers;

use Exception;
use App\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class ProductsController extends Controller
{
    /**
     * Mostrar todos los productos
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            /**
             * Obtener datos con Model::all();
             */
            $products = Products::all();
            /**
             * Retornar vista con datos en variable $response
             */
            if(Auth::check() && Auth::user()->user_type == 1){
                 return view('crudProduct')->with('response', $products);
            }
            return view('products')->with('response', $products);
        } catch (Exception $ex) {
            return view('products')->with('response', null);
        }
    }


    /**
     * Crear un nuevo Producto
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->middleware('auth');
           
            /**
             * validaciones de seguridad
             */
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                //'Imagen' => 'string',
                'description' => 'required|string',
                'color' => 'required|string',
                'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                'discount' => 'required|numeric'
                //'Estado' => 'required|boolean',
            ]);
            /**
             * Respuesta de validacion
             */
            if ($validator->fails()) {
                return Redirect::action('ProductsController@index');
            }
            $input = $request->all();

            $input['image']="Ruta";
            $input['iva']= 0;
            $input['state']= 1;
            $input['user_id']=1;
            /**
             * Se crea el registro en la base de datos
             */
            $data = Products::create($input);
            /**
             * Respondemos y redireccionamos
             */
            return Redirect::action('ProductsController@index');
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Mostrar un producto en especifico
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products,$id)
    {
        try {
            /**
             * Consultamos por id  el producto por el metodo find()
             */
            // $product = DB::table('products')
            // ->select('id', 'name',
            // 'description','color','price','iva',
            // 'dicount','size_s','size_m','size_l','state')
            // ->where('id', '=', $id)->get();
            $product = Products::find($id);
            if(Auth::check() && Auth::user()->user_type == 1){
                return view('editProduct')->with('response', $product);
           }
            //Respondemos con los datos consultados
            return view('viewProduct')->with('response', $product);
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Actualizamos el producto
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @param  Integer  $id Identificador pasado por url
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products,$id)
    {
        try {

            $product = Products::find($id);
            if ($product == null) {
                return Redirect::action('ProductsController@index');
            }
            /**
             * Validaciones 
             * Para comprender mejor el Framework se recomienda aprenderlo primero
             * :)
             */
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                //'Imagen' => 'string',
                'description' => 'required|string',
                'color' => 'required|string',
                'price' => 'required|numeric',
                //'IVA' => 'required|numeric',
                'discount' => 'required|numeric',
                //'Estado' => 'required|boolean',
            ]);

            if ($validator->fails()) {
                return Redirect::action('ProductsController@index');
            }  
            
            $product->name = $request->get("name");
            $product->description = $request->get("description");
            $product->color = $request->get("color");
            $product->price = $request->get("price");
            $product->discount = $request->get("discount");     
            $product->save();
            //Respuesta a vista redirect
            return Redirect::action('ProductsController@index');
        }catch(Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }

    /**
     * Eliminar el producto con id pasado por url
     *
     * @param  \App\Products  $products
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products,$id)
    {
        try {
            $product = Products::find($id);
            if ($product == null) {
                return Redirect::action('ProductsController@index');
            }
            Products::destroy($product['id']);
            return Redirect::action('ProductsController@index');
        } catch (Exception $ex) {
            return Redirect::action('ProductsController@index');
        }
    }
}
