<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Swith language
     */
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languages'))) {
            session()->put('locale', $lang);
        }
        return Redirect::back();
    }
}