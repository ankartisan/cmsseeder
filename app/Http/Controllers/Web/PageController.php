<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\ApiController;
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
        $products = Product::all();
        return view('home', ['products' => $products]);
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
