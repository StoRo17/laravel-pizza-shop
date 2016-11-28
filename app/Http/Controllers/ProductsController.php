<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\ProductRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;


class ProductsController extends Controller
{
    /**
     * Show the page with all of the products.
     *
     * @return Response
     */
    public function index()
    {
        $products = Product::all();

        return view('startpage')->with('products', $products);
    }

    /**
     * Get all information about product and send it to product page.
     *
     * @param string $category
     * @param integer $id
     * @return Response
     */

    public function show($category, $id)
    {
        $product = Product::findOrFail($id);

        return view('main.productDescription')->with('product', $product);

    }

    /**
     * Show the page with given category.
     *
     * @param string $category
     * @return $Response
     */

    public function showCategory($category)
    {
        $products = Product::where('category', $category)->get();

        return view('main.showCategory')->with('products', $products);
    }

    /**
     * Show the create product page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function create()
    {
        return view('main.createProduct');
    }

    /**
     * Handle information about new product and store it.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function store(ProductRequest $request)
    {
        $name = mb_convert_case(trim($request->name), MB_CASE_TITLE);
        $imageName = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $pathToImages = public_path('images/');

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

    public function addToCart(Request $request, Product $product) 
    {  
        $product = $product->find($request->productId);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $product->id);
        // Session::forget('cart');
        Session::put('cart', $cart);

        $returnHTML = view('cart.cart')->render();
        return response()->json([
            'success' => 'Успех',
            'html' => $returnHTML
            ]);
    }

    public function deleteFromCart(Request $request, Product $product)
    {
        $product = $product->find($request->productId);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->deleteFromCart($product->id);

        if (empty($cart->items)) {
            Session::forget('cart');
        } else {
            Session::put('cart', $cart);
        }
    
        $returnHTML = view('cart.cart')->render();
        return response()->json([
            'success' => 'Элемент удалён',
            'html' => $returnHTML
            ]);
    }
}
