<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        try {
            $clientes = DB::table('clientes')->select('*')->get();
            return view('home', compact('clientes'));
        } catch (\Exception $error) {
            return $error;
        }
    }
}
