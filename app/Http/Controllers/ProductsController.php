<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Http\Requests\ProductRequest;
use App\Product;


class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('startpage')->with('products', $products);
    }

    public function show($category, $id)
    {
        $product = Product::findOrFail($id);

        return view('main.productDescription')->with('product', $product);

    }

    public function showCategory($category)
    {
        $products = Product::where('category', $category)->get();

        return view('main.showCategory')->with('products', $products);
    }

    public function create()
    {
        return view('main.createProduct');
    }

    public function store(ProductRequest $request)
    {
        $imageName = $request->name . '.' . $request->file('image')->getClientOriginalExtension();
        $pathToImages = base_path() . '/public/images/';

        $request->file('image')->move($pathToImages, $imageName);

        $data = [
            'category' => $request->category,
            'name' => $request->name,
            'price' => $request->price,
            'weight' => $request->weight,
            'pathToImage' => 'images/' . $imageName,
            'composition' => $request->composition,
            'description' => $request->description
        ];

        Product::create($data);

        return redirect('/');
    }
}
