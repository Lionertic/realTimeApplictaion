<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new GuzzleHttp\Client();
        $res = $client->get('flask/index');
        dd($res->getBody()->getContents());
        return view('home');
    }
}
