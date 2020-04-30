<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Tags;
use Illuminate\Http\Request;



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
        $totalTags = Tags::count();
        $totalProdutos = Produtos::count();
        return view('home',compact('totalTags', 'totalProdutos'));
    }
}
