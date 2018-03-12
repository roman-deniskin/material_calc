<?php

namespace App\Http\Controllers;

use App\Models\Material;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Contracts\Validation\Validator;
use DB as Database;

class UnitController extends Controller
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
        $units = Database::table('units')->get();
        return view('unitsList', compact('units'));
    }

    public function post(Request $request)
    {
        $unit = new Unit();
        /*$this->validate($request, [
            'name' => 'required|unique:materials|max:255',
            'unit' => 'required|max:30',
            'unitPrice' => 'required|numeric|max:10',
        ]);*/
        $unit->Insert($request);
        $unit = Database::table('materials')->get();
        if ($unit->invalidData)
            return redirect('home')->withErrors('Invalid form data');
        return redirect('home');
    }
}
