<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest('id')->paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('admin.categories.create',compact('category'));
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
            'image'=>'required|image|mimes:png,jpg',
        ]);


        //uploads file
        $img_name = rand().time().$request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/categories/'),$img_name);

        //store to database
        Category::create([
            'name_en'=> $request->name_en ,
            'name_ar'=> $request->name_ar ,
            'image'=>$img_name,
        ]);

        //redirect

        return redirect()->route('admin.categories.index')->with('msg','Category Add Successfully')->with('type','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.edit' , compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $request->validate([
          'name_en'=>'required',
          'name_ar'=>'required',
          'image'=>'nullable|image|mimes:png,jpg',
      ]);


      $img_name = $category->image;
      if($request->hasFile('image')){

          File::delete(public_path('uploads/categories/'.$img_name));
          $img_name = rand().time().$request->file('image')->getClientOriginalName();
          $request->file('image')->move(public_path('uploads/categories/'),$img_name);
      }



      $category->update([
          'name_en'=> $request->name_en ,
          'name_ar'=> $request->name_ar ,
          'image'=>$img_name,
      ]);

      return redirect()->route('admin.categories.index')->with('msg','Category Updated Successfully')->with('type','info');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        File::delete(public_path('uploads/categories/'.$category->image));
        Category::destroy($id);

        return redirect()->route('admin.categories.index')->with('msg','Category deleted Successfully')->with('type','danger');
    }
}
