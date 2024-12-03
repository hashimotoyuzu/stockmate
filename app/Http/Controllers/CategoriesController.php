<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller

public function category(Request $request)
{  
    $request->validate([
        'name' => 'required|max:20',
        'xpiration' => 'required|integer',
        'stock' => 'required|integer',
        'memo' => 'required|max:140',
    ]);

    $category = new category;
    $category -> name = $request->input(["name"]);
    $category -> xpiration= $request->input(["xpiration"]);
    $category -> stock= $request->input(["stock"]);
    $category -> memo = $request->input(["memo"]);
    $category ->save();

    return redirect()->route('ctegories.index');
}

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

