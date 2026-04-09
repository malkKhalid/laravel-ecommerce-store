<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = Product::latest('id')->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        return view('admin.products.create',compact('product','categories'));
    }

   /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validare
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'image'=>'required|image|mimes:png,jpg',
        ]);


        //uploads file
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/products/'),$img_name);

        //store to database
        Product::create([
            'name_en'=> $request->name_en ,
            'name_ar'=> $request->name_ar ,
            'content_en'=>$request->content_en,
            'content_ar'=>$request->content_ar,
            'price'=>$request->price,
            'sale_price'=>$request->sale_price,
            'quantity'=>$request->quantity,
            'category_id'=>$request->category_id,
            'image'=>$img_name,
        ]);

        //redirect

        return redirect()->route('admin.products.index')->with('msg','Product Add Successfully')->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $post = Post::findOrFail($id);
        // return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.products.edit' , compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        //validate data
        $request->validate([
            'name_en'=>'required',
            'name_ar'=>'required',
            'content_en'=>'required',
            'content_ar'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'category_id'=>'required',
            'image'=>'nullable|image|mimes:png,jpg',
        ]);


      //uploads file
      $img_name = $product->image;
      if($request->has('image')){
          // dd('done');
          //delet old image
          File::delete(public_path('uploads/products/'.$img_name));
          $img_name = rand().time().$request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/products/'),$img_name);
      }



      //Add Data to Databas
      $product->update([
          'name_en'=> $request->name_en ,
          'name_ar'=> $request->name_ar ,
          'image'=>$img_name,
          'content_en'=>$request->content_en,
          'content_ar'=>$request->content_ar,
          'price'=>$request->price,
          'sale_price'=>$request->sale_price,
          'quantity'=>$request->quantity,
          'category_id'=>$request->category_id,

      ]);

      return redirect()->route('admin.products.index')->with('msg','Product Updated Successfully')->with('type','info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        File::delete(public_path('uploads/products/'.$product->image));
        Product::destroy($id);

        return redirect()->route('admin.products.index')->with('msg','Product deleted Successfully')->with('type','danger');
    }
}
