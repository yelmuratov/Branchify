<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Base;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $branches = Branch::all();
        return view('branches.index', compact('branches'));
    }

    public function create(){
        $bases = Base::all();
        return view('branches.form', compact('bases'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'parent_id' => 'required',
            'own_price' => 'nullable',
        ]);

        Branch::create($request->all());
        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }

    public function edit(Branch $branch){
        $bases = Base::all();
        return view('branches.form', compact('branch', 'bases'));
    }

    public function update(Request $request, Branch $branch){
        $request->validate([
            'name' => 'required',
            'base_id' => 'required',
        ]);

        $branch->update($request->all());
        return redirect()->route('branches.index')->with('success', 'Branch updated successfully.');
    }

    public function destroy(Branch $branch){
        $branch->delete();
        return redirect()->route('branches.index')->with('success', 'Branch deleted successfully.');
    }
}

