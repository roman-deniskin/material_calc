<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;
use DB as Database;

class DetailController extends Controller
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
        $details = \App\Models\Detail::GetMaterialsInDetails();
        return view('detailsList', ['data' => $details]);
    }

    public function post(Request $request)
    {
        $detail = new Detail();
        /*$this->validate($request, [
            'name' => 'required|unique:materials|max:255',
            'unit' => 'required|max:30',
            'unitPrice' => 'required|numeric|max:10',
        ]);*/
        $detail->Insert($request);
        $materials = Database::table('details')->get();
        if ($detail->invalidData)
            return redirect('home')->withErrors('Invalid form data');
        return redirect('home');
    }
}
