<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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

        // $multipleUnion = DB::table('segmentations')->union(DB::table('business_units'))
        //  ->union(DB::table('digital_products'))->union(DB::table('dormants'))->get();

        // dd($multipleUnion);
        return view('home');
    }
}
