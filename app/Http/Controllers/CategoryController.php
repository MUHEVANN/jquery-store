<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CategoryController extends Controller
{
    public function index()
    {
        $header = 'Category';
        return view('pages/dashboard/category/index', compact('header'));
    }

    public function getCategoriDatatable()
    {
        $categories = Category::all();
        return DataTables::of($categories)->addIndexColumn()->addColumn('action', function ($d) {
            return view('components.update-delete')->with('data', $d);
        })->make(true);
    }

    public function allData()
    {
        $categories = Category::all();
        return response()->json($categories, 200);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validated->fails()) {
            return response()->json($validated->errors(), 400);
        }
        $category = Category::create($request->all());
        return response()->json($category, 200);
    }

    public function show(Category $category)
    {
        return response()->json($category, 200);
    }

    public function edit(Category $category)
    {
        return response()->json($category, 200);
    }

    public function update(Category $category, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|string',
        ]);
        if ($validated->fails()) {
            return response()->json($validated->errors(), 400);
        }
        $category->update($request->all());
        return response()->json($category, 200);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return response()->json($category, 200);
    }
}
