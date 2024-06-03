<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function create(){
        return view('frontend.products-create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => 'required',
            'price' => 'required:numeric',
            'active' => 'sometimes',
        ],
        [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',]
    );

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->is_active = $request->active == 'on' ? 1 : 0;
        $product->save();

        return redirect('/products');

    }
}
