<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index() {
        $products = Product::orderByDesc('id')->limit(6)->get();
        return view('site.index',compact('products'));
    }

    public function all_category() {
        $categories = Category::orderByDesc('id')->get();
        return view('site.categories',compact('categories'));
    }

    public function category($id) {
        $categories = Category::orderByDesc('id')->get();
        $category =Category::findOrFail($id);
        return view('site.category',compact('category','categories'));
    }


    public function shop() {
        $categories = Category::orderByDesc('id')->get();
        $products = Product::orderByDesc('id')->paginate(9);
        return view('site.products',compact('products','categories'));
    }

    public function product($id) {
        $product =Product::findOrFail($id);
        return view('site.product',compact('product'));
    }

    public function all_blog() {
        return view('site.all_blog');
    }
    public function blog() {
        return view('site.product');
    }

    public function about() {
        return view('site.about');
    }

    public function contact() {
        return view('site.contact');
    }

}
