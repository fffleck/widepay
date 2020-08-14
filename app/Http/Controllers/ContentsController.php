<?php

namespace App\Http\Controllers;

use App\retornos;
use App\urls;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $retornos = retornos::all();
        return view('contents.list')->with(compact('retornos'));
    }

}
