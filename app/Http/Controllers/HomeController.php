<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tweet;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(auth());
        return view('home', [
            'tweets' => auth()->user()->timeline()
        ]);
    }
}
