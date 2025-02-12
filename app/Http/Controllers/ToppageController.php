<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToppageController extends Controller
{
    // トップページ画面表示p
    public function index(){
        return view('toppage.index');
    }
}
