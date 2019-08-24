<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class PageController extends ApiController
{

    /*
    |--------------------------------------------------------------------------
    | FRONT
    |--------------------------------------------------------------------------
    */

    public function home(Request $request)
    {
        $featuredProducts = Product::where('featured', 1)->get();

        $categories = Category::all()->take(3);

        $products = Product::all()->take(8);

        return view('home', ['featuredProducts' => $featuredProducts, 'categories' => $categories, 'products' => $products]);
    }

    public function contact(Request $request)
    {
        return view('contact');
    }

    public function contactSubmit(Request $request)
    {
        Mail::send(new ContactMail($request->all()));

        return $this->respond(["success" => 1]);
    }

    public function sitemap(Request $request)
    {
        return view('sitemap', []);
    }

    public function sitemapXML()
    {
        return response()->view('sitemap_xml', [])->header('Content-Type', 'text/xml');
    }

}
