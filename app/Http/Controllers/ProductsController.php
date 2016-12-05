<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\ProductRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Session;
use Stripe\{Stripe, Charge};

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

    /**
     * Find and add choosen product to cart.
     * @param Request $request
     * @param Product $product
     * @return Response JSON
     */
    public function addToCart(Request $request, Product $product) 
    {  
        $product = $product->find($request->productId);
        $oldCart = Session::has('cart') ? Session::get('cart') : null; // check if we already got cart in session
        $cart = new Cart($oldCart);
        $cart->addToCart($product, $product->id);
        Session::put('cart', $cart);

        $returnHTML = view('cart.cart')->render();
        return response()->json([
            'success' => 'Успех',
            'html' => $returnHTML
            ]);
    }

    /**
     * Delete choosen product from cart.
     * @param  Request $request 
     * @return Response JSON
     */
    public function deleteFromCart(Request $request)
    {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->deleteFromCart($request->productId);

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

    public function buyProducts(Request $request, Order $order)
    {
        $cart = Session::get('cart');

        Stripe::setApiKey('sk_test_WLRHLuQRqs7pJYIgOiOAVuHF');

        try {
            $charge = Charge::create([
                'amount' => round(($cart->totalPrice/60), 2) * 100,
                'currency' => 'usd',
                'source' => $request['stripeToken'],
                'description' => 'Test Charge'
            ]);

            $order->cart = serialize($cart);
            $order->address = $request['address'];
            $order->payment_id = $charge->id;
            auth()->user()->orders()->save($order);
        } catch (\Exception $error) {
            return redirect('/')->with('error', $error->getMessage());
        }

        Session::forget('cart');
        return redirect('/')->with('success_message', 'Покупка успешно завершена!');
    }
}
