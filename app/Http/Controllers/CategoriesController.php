<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function add()
    {
        return view('category.create');
    }

    public function index()
    {
        return view('category.create');
    }

    public function create()
    {
        return redirect('category.create');
    }

    public function edit()
    {
        return view('category.create');
    }

    public function update()
    {
        return redirect('category.create');
    }

    public function new()
    {
        return redirect('category.create');
    }

    public function show()
    {
        return redirect('category.create');
    }

    public function destroy()
    {
        return redirect('category.create');
    }
}
