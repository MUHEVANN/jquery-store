<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        return view('pages/dashboard/product/index');
    }

    public function allData(Request $request)
    {


        $product = Product::with('categories')->get();
        // return response()->json($product, 200);

        return DataTables::of($product)->addIndexColumn()->make(true);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' =>  "required",
            "price" => "required|integer",
            "description" => "string|required"
        ]);
        if ($validated->fails()) {
            return response()->json($validated->messages(), 400);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
        ]);

        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function all()
    {
        $categories = Product::all();
        return response()->json($categories, 200);
    }

    public function getByCategory($category)
    {
        $products = Product::with('categories')->whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category);
        })->get();
        return response()->json($products, 200);
    }
}
