<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\User;
use Boxt\Services\Payments\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | FRONT
    |--------------------------------------------------------------------------
    */

    public function home(Request $request)
    {
        return view('docs-ui-kit/index');
    }

    public function login(Request $request)
    {
        return view('login');
    }

    public function register(Request $request)
    {
        return view('register');
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

    public function termsConditions(Request $request)
    {
        return view('terms_and_conditions');
    }

    public function privacyPolicy(Request $request)
    {
        return view('privacy_policy');
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
