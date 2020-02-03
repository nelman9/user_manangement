<?php

namespace UserM\Http\Controllers;

use UserM\Product;
use Illuminate\Http\Request;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class ProductController extends Controller
{

    public function __construct(){

       $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $products=Product::all();
         return view('product')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
         $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
        ]);
        $products= Product::create($validatedData);
        $request->session()->flash('alert-success', 'product was successful saved!');
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \UserM\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \UserM\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        //
        $product=Product::findorFail($id);
        return view('productEdit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \UserM\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validatedinfo= $request->validate([
             'name' => 'required|max:255',
             'price' => 'required',
        ]);

        Product::whereId($id)->update($validatedinfo);
        $request->session()->flash('alert-success', 'product was successful updated!');
        return Redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \UserM\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product->delete();
        $request->session()->flash('alert-success', 'Product was successfuly deleted');
        return redirect()->route('product.index');
    }
}
