<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Redirect;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $products = Product::latest()->paginate(5);
            $items = Product::orderBy('product_name')->get();
            return view('products.index',compact('products', 'items'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
        return Redirect::to("auth/login")->withSuccess('Opps! You do not have access');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('products.create');
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
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_status' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
        ]);

        Product::create($request->all());
        return Redirect::to('/products')->with('success','Product Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        return view('products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $product = Product::find($id);
        $request->validate([
            'product_name' => 'required',
            'product_description' => 'required',
            'product_status' => 'required',
            'product_price' => 'required',
            'product_code' => 'required',
        ]);

        $product->update($request->all());
        return Redirect::to('/products')->with('success','Product Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $product = Product::find($id);
        $product->delete();
        return Redirect::to('/products')->with('success','Product deleted successfully.');
    }

    public function changeStatus(Request $request)
    {
//         error_log('Some message here - AAAA: ' . $request . '-----------------------');
        $product = Product::find($request->id);
//         error_log($product);
        $product->product_status = $request->status;
        $product->save();
//         return Redirect::to('/products')->with('success','Product deleted successfully.');
    }

}
