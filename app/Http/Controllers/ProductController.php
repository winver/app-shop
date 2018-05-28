<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //

    public function index()
    {
         $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products'));//listado
    }

    public function create()
    {

    	return view('admin.products.create');//formulario de registro
    }

    public function store(Request $request)
    {

    	//registrar el nuevo producto en la BD
    	//dd($request->all());
        $product= new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();  //insert

        return redirect('/admin/products');
    }

 public function edit($id)
    {
        
        //return "mostrar aqui el form de edicion para el producto con id $id";   //de prueba para mostrar el ID
        $product = Product::find($id);
    	return view('admin.products.edit')->with(compact('product'));//formulario de registro
    }

    public function update(Request $request, $id)
    {

    	//registrar el nuevo producto en la BD
    	//dd($request->all());
        $product= Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();  //UPDATE

        return redirect('/admin/products');
    }

}
