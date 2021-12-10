<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //  Bangla Language
    public function bangla(){
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'bangla');
        return redirect()->back();
    }

    //  English Language
    public function english(){
        Session::get('language');
        Session::forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }
}