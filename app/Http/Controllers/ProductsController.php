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
        $name = mb_convert_case(trim($request->name), MB_CASE_TITLE);
        $imageName = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $pathToImages = base_path() . '/public/images/';

        $request->file('image')->move($pathToImages, $imageName);

        if ($request->diameter == '') {
            $request->diameter = NULL;
        }
        $data = [
            'category' => $request->category,
            'name' => $name,
            'price' => $request->price,
            'weight' => $request->weight,
            'diameter' => $request->diameter,
            'pathToImage' => 'images/' . $imageName,
            'composition' => $request->composition,
            'description' => $request->description
        ];

        Product::create($data);

        return redirect('/')->with('success_message', 'Товар был успешно добавлен!');
    }
}
