<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use DB as Database;

class MaterialController extends Controller
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
        $materials = Database::table('materials')->get();
        return view('materialsList', compact('materials'));
    }

    public function post(Request $request)
    {
        $material = new Material();
        $this->validate($request, [
            'name' => 'required|unique:materials|max:255',
            'unit' => 'required|max:30',
            'unitPrice' => 'required|numeric|max:10',
        ]);
        $material->Insert($request);
        $materials = Database::table('materials')->get();
        if ($material->invalidData)
            return $view = redirect('home')->withErrors('Invalid form data');
        return view('material', compact('materials'));
    }
}
