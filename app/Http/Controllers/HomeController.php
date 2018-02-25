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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materials = DB::table('materials')->get();
        $details = [];
        $db_values = [$materials, $details];
        /*echo '<pre>';
        var_dump($db_values);
        echo '</pre>';
        exit;*/
        return view('home', ['materials' => $materials, 'details' => $details]);
    }
}
