<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $this->validate($request, [
        //     'product_name' => 'required'
        // ]);

        $products = Product::where("name","LIKE","%{$request->input('product_name')}%")->paginate(3);
        return view('pages.result')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.add');
        
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image_url' => 'image|nullable|max:1999'
        ]);

        //to handle file in updload
        if ($request->hasFile('image_url')){
            //to get the filename with ext
            $file = $request->file('image_url')->getClientOriginalName();
            //get file name
            $filename = pathinfo($file, PATHINFO_FILENAME);
            //get extensiopn
            $ext = $request->file('image_url')->getClientOriginalExtension();
            //new filename
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            #upload
            $path = $request->file('image_url')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore ='noimage.jpg';
        }
        $product = new Product;
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->stocks = $request->input('stocks');
        $product->description = $request->input('description');
        $product->groups = $request->input('groups');
        $product->image_url = $fileNameToStore;
        $product->save();

        return redirect('/');
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
        $product = Product::findorfail($id);
        return view('pages.edit')->with('product', $product);
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
        $this->validate($request, [
            'name' => 'required',
            'price' => 'required',
            'image_url' => 'image|nullable|max:1999'
        ]);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->groups = $request->input('groups');
        $product->stocks = $request->input('stocks');
        $product->description = $request->input('description');
        //to handle file in updload this way if no new image added the image 
        //wont be updated.
        if ($request->hasFile('image_url')){
            //to get the filename with ext
            $file = $request->file('image_url')->getClientOriginalName();
            //get file name
            $filename = pathinfo($file, PATHINFO_FILENAME);
            //get extensiopn
            $ext = $request->file('image_url')->getClientOriginalExtension();
            //new filename
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            #upload
            $path = $request->file('image_url')->storeAs('public/images', $fileNameToStore);
        }else{
            $fileNameToStore = $product->image_url;
        }
        $product->image_url= $fileNameToStore;
        $product->save();

        return redirect('/');
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
        $product = Product::findorfail($id);
        if($product->imgage_url != 'noimage.jpg'){
            //add sotrage lib
            //to delete
            Storage::delete('public/images/'.$product->imgage_url);
        }
        $product->delete();
        return redirect('/');
    }
}
