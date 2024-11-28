<?php

namespace App\Http\Controllers;

use App\Models\Base;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function index(){
        $bases = Base::all();
        return view('bases.index', compact('bases'));
    }

    public function create(){
        return view('bases.form');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        Base::create($request->all());
        return redirect()->route('bases.index')->with('success', 'Base created successfully.');
    }

    public function edit(Base $base){
        return view('bases.form', compact('base'));
    }

    public function update(Request $request, Base $base){
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $base->update($request->all());
        return redirect()->route('bases.index')->with('success', 'Base updated successfully.');
    }

    public function destroy(Base $base){
        $base->delete();
        return redirect()->route('bases.index')->with('success', 'Base deleted successfully.');
    }
}

