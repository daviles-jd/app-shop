<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products')); //listado
    }

    public function create()
    {
        return view('admin.products.create'); //formulario de registro
    }

    public function store(Request $request)
    {
        /****Recoger los datos en el navegador
        dd($request->all()); */

        //Validar los datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripción del producto es requerida',
            'description.max' => 'La descripción solo admite 200 caracteres',
            'description.min' => 'La descripción debe tener al menos 50 caracteres',
            'long_description.required' => 'La descripción extensa del producto es requerida',
            'long_description.max' => 'La descripción extensa admite 700 caracteres',
            'long_description.min' => 'La descripción extensa debe tener al menos 50 caracteres',
            'price.required' => 'El precio del producto es requerido',
            'price.numeric' => 'Ingrese un precio valido',
            'price.min' => 'No se admiten valores negativos',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200|min:50',
            'long_description' => 'required|max:700|min:100',
            'price' => 'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);
        
        //registrar el nuevo producto en la BD
        	$product = new Product();
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->long_description = $request->input('long_description');
            $product->save();
            
            return redirect('/admin/products');
    }

    public function edit($id)
    {
        //return "id del producto $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product')); //formulario de registro
        
    }

    public function update(Request $request, $id)
    {
        /****Recoger los datos en el navegador
        dd($request->all()); */

        //Validar los datos
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres',
            'description.required' => 'La descripción del producto es requerida',
            'description.max' => 'La descripción solo admite 200 caracteres',
            'description.min' => 'La descripción debe tener al menos 50 caracteres',
            'long_description.required' => 'La descripción extensa del producto es requerida',
            'long_description.max' => 'La descripción extensa admite 700 caracteres',
            'long_description.min' => 'La descripción extensa debe tener al menos 50 caracteres',
            'price.required' => 'El precio del producto es requerido',
            'price.numeric' => 'Ingrese un precio valido',
            'price.min' => 'No se admiten valores negativos',
        ];

        $rules = [
            'name' => 'required|min:3',
            'description' => 'required|max:200|min:50',
            'long_description' => 'required|max:700|min:100',
            'price' => 'required|numeric|min:0',
        ];
        $this->validate($request, $rules, $messages);
        
        //registrar el nuevo producto en la BD
        	$product = Product::find($id);
            $product->name = $request->input('name');
            $product->description = $request->input('description');
            $product->price = $request->input('price');
            $product->long_description = $request->input('long_description');
            $product->save(); //UPDATE
            
            return redirect('/admin/products');
    }

    public function destroy($id)
    {
        
        	$product = Product::find($id);
            $product->delete(); //DELETTE
            
            return back();
    }
}
