<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function index()
    {
        $header = 'Product';
        return view('pages/dashboard/product/index', compact('header'));
    }

    public function allData(Request $request)
    {


        $product = Product::with('categories', 'images')->get();
        // return response()->json($product, 200);

        return DataTables::of($product)->addIndexColumn()->addColumn('action', function ($d) {
            return view('components.update-delete')->with('data', $d);
        })->make(true);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        $validated = Validator::make($request->all(), [
            'name' =>  "required",
            "price" => "required|integer",
            "description" => "string|required",
            "image.*" => "required|mimes:jpg,jpeg,webp,svg,png",
            'category' => 'required'
        ]);
        if ($validated->fails()) {
            DB::rollBack();
            return response()->json($validated->errors(), 400);
        }

        $product = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category
        ]);

        $files = $request->file('image');

        if (is_array($files)) {
            foreach ($files as $file) {

                $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/product-image', $file_name);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image' => $file_name
                ]);
            }
        } else {
            return response()->json(['image' => 'Add One Image'], 400);
        }



        DB::commit();
        return response()->json([
            'message' => 'Product created successfully',
            'product' => $product
        ], 201);
    }

    public function all()
    {

        $product = Product::with('images')->paginate(15);
        return response()->json($product, 200);
    }

    public function getByCategory($category)
    {
        $products = Product::with('categories', 'images')->whereHas('categories', function ($query) use ($category) {
            $query->where('categories.id', $category);
        })->paginate(15);
        return response()->json($products, 200);
    }

    public function edit(Product $product)
    {
        $product->load('images', 'categories');

        return response()->json($product, 200);
    }

    public function update(Product $product)
    {
        DB::beginTransaction();
        try {
            $validated = Validator::make(request()->all(), [
                'name' =>  "required",
                "price" => "required|integer",
                "description" => "string|required",
                "image.*" => "required|mimes:jpg,jpeg,webp,svg,png",
                'category' => 'required'
            ]);
            if ($validated->fails()) {
                return response()->json($validated->errors(), 400);
            }

            $product->name = request('name');
            $product->price = request('price');
            $product->description = request('description');
            $product->category_id = request('category');
            if (request()->hasFile('image')) {
                $files = request()->file('image');
                if (is_array($files)) {
                    foreach ($files as $file) {

                        $file_name = Str::uuid() . '.' . $file->getClientOriginalExtension();
                        $file->storeAs('public/product-image', $file_name);

                        ProductImage::create([
                            'product_id' => $product->id,
                            'image' => $file_name
                        ]);
                    }
                } else {
                    throw 'Image must be an array';
                }
            }


            $product->save();

            DB::commit();
        } catch (\Throwable  $e) {
            DB::rollBack();
            return response()->json(['data' => $e->getMessage()], 400);
        }
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json('Product deleted successfully', 200);
    }

    public function deleteImage(ProductImage $image)
    {
        $check_image = ProductImage::where('product_id', $image->product_id)->get();
        if (count($check_image) <= 1) {
            return response()->json('Product must have at least one image', 400);
        }

        if (file_exists(storage_path('app/public/product-image/' . $image->image))) {
            unlink(storage_path('app/public/product-image/' . $image->image));
        }

        $image->delete();
        return response()->json('Image deleted successfully', 200);
    }

    public function productImageByProduct(Product $product)
    {
        $images = ProductImage::where('product_id', $product->id)->get();
        return response()->json($images, 200);
    }

    public function show() {}
}
