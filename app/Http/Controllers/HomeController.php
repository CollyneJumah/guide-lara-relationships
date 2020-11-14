<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrandFather;
use App\Models\Fathers;
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

        //display grandfathers,fathers on homepage
        $showAllGrantFathers = GrandFather::OrderBy('created_at')->paginate(5);
        $showAllFathers = Fathers::OrderBy('created_at')->paginate(5);

        //display GrandFathers on select input 
        return view('home', compact('showAllGrantFathers','showAllFathers'));
    }
}
