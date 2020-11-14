<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrandFather;

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

        //display grandfathers on homepage
        $showAllGrantFathers = GrandFather::OrderBy('created_at')->paginate(5);
        return view('home', compact('showAllGrantFathers'));
    }
}
