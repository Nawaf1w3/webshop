<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Categorie;
use App\Models\Size;
use Illuminate\Support\Str;


class productController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $categories = Categorie::all(); // Assuming you have a Category model

        return view('product.list', compact('products', 'categories'));
    }

    public function filter(Request $request)
    {
        $categoryId = $request->input('category_id');

        $products = ($categoryId == 0) ? Product::all() : Product::where('category_id', $categoryId)->get();
        
        return response()->json($products);
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categorie::get();
        $sizes = Size::get();
        return view('product.create', compact('categories','sizes'));
    }

    /**
     * Store a newly created resource in storage.
     */


    public function store(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'productName' => 'required',
            'productDescription' => 'required',
            'price' => 'required|numeric',
            'categorie' => 'required|exists:categories,id',
            // 'DisplayImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'ProductImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            // 'ProductImage2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'sizes.*' => 'required|exists:sizes,id', // Validate that sizes are selected and exist
            'quantities.*' => 'nullable|integer|min:0', // Validate quantity input for each size
        ]);
    
        // Create new product
        $product = new Product;
        $product->name = $validatedData['productName'];
        $product->description = $validatedData['productDescription'];
        $product->price = $validatedData['price'];
        $product->category_id = $validatedData['categorie'];
        $product->save();
 

        foreach ($validatedData['quantities'] as $sizeId => $quantity) {
            // Attach size to the product with the provided quantity
            $product->sizes()->attach($sizeId, ['quantity_available' => $quantity]);
        }


        // Generate unique filename prefix using product ID and other relevant information
        $filenamePrefix = uniqid() . '_' . Str::slug($validatedData['productName']);

        // Store display image
        $displayImage = $request->file('DisplayImage');
        $displayImageName = $filenamePrefix . '.' . $displayImage->getClientOriginalExtension();
        $displayImage->move(public_path('assets/img/product_images'), $displayImageName);
        $product->images()->create(['path' => 'assets/img/product_images/' . $displayImageName]);

        // Store additional images if provided
        if ($request->hasFile('ProductImage')) {
            $productImage = $request->file('ProductImage');
            $productImageName = $filenamePrefix . '_product_image.' . $productImage->getClientOriginalExtension();
            $productImage->move(public_path('assets/img/product_images'), $productImageName);
            $product->images()->create(['path' => 'assets/img/product_images/' . $productImageName]);
        }

        if ($request->hasFile('ProductImage2')) {
            $productImage2 = $request->file('ProductImage2');
            $productImage2Name = $filenamePrefix . '_product_image2.' . $productImage2->getClientOriginalExtension();
            $productImage2->move(public_path('assets/img/product_images'), $productImage2Name);
            $product->images()->create(['path' => 'assets/img/product_images/' . $productImage2Name]);
        }
            
        // Redirect or return response
        return redirect()->route('product.list')->with('success', 'Product added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $product = Product::findOrFail($id);
        $sizes = $product->sizes()->withPivot('quantity_available')->get();
        // dd($sizes);
        $currentProductId = $id;
        $products = Product::where('id', '!=', $id)->get();
        
        return view('product.show', compact('product', 'sizes', 'products', 'currentProductId'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }



}