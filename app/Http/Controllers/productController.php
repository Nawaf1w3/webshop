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
        $products = Product::get();
        $categories = Categorie::get();
        $sizes = Size::get();
        return view('product.create', compact('products','categories','sizes'));
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
            'DisplayImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ProductImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ProductImage2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'parent_product' => 'nullable|exists:products,id',
            'sizes.*' => 'required|exists:sizes,id', // Validate that sizes are selected and exist
            'quantities.*' => 'nullable|integer|min:0', // Validate quantity input for each size
        ]);
    

        $filenamePrefix = uniqid() . '_' . Str::slug($validatedData['productName']);


        $parentProductId = $request->input('parent_product');
        if (!empty($parentProductId)) {


            // If a parent product is selected, treat the current product as a variant
            $parentProduct = Product::findOrFail($parentProductId);
            $product = new Product;
            $product->name = $validatedData['productName'];
            $product->description = $validatedData['productDescription'];
            $product->price = $validatedData['price'];
            $product->category_id = $validatedData['categorie'];
            $product->parent_id = $parentProduct->id;
            $product->save();
            foreach ($validatedData['quantities'] as $sizeId => $quantity) {
                // Attach size to the product with the provided quantity
                $product->sizes()->attach($sizeId, ['quantity_available' => $quantity]);
            }

        
            // Handle image upload for variants
            if ($request->hasFile('DisplayImage')) {
                $displayImage = $request->file('DisplayImage');
                $displayImageName = $filenamePrefix . '_display_image.' . $displayImage->getClientOriginalExtension();
                $displayImage->move(public_path('assets/img/product_images'), $displayImageName);
                $product->images()->create(['path' => 'assets/img/product_images/' . $displayImageName]);
            }
        
            // Handle additional images if provided
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
        
            return redirect()->route('product.list')->with('success', 'Variant added successfully.');
        }
        
        // If no parent product is selected, treat the current product as a standalone product



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

        // Handle image upload for standalone products
        if ($request->hasFile('DisplayImage')) {
            $displayImage = $request->file('DisplayImage');
            $displayImageName = $filenamePrefix . '_display_image.' . $displayImage->getClientOriginalExtension();
            $displayImage->move(public_path('assets/img/product_images'), $displayImageName);
            $product->images()->create(['path' => 'assets/img/product_images/' . $displayImageName]);
        }
        
        // Handle additional images if provided
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
        
        return redirect()->route('product.list')->with('success', 'Product added successfully.');
    }        
    
    public function createCategory()
    {
        return view('product.categories');
    }

    public function storeCategory(Request $request)
    {
        //dd($request);
    // Validate incoming request data
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
    ]);

    // Create new category
    $category = new Categorie;
    $category->name = $validatedData['name'];
    $category->description = $validatedData['description'];

    // Handle category image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = uniqid() . '_' . Str::slug($validatedData['name']) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/img/categories'), $imageName);
        $category->img_path = 'assets/img/categories/' . $imageName;
    }

    $category->save();
       // dd($category);
    
        return redirect()->route('product.list')->with('success', 'Category added successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::where('id', '!=', $id)->get();
        


        
        $sizes = $product->sizes()->withPivot('quantity_available')->get();
   
        $currentProductId = $id;
    
        $parentProduct = null;
        $variants = null;

        if ($product->isVariant()) {
            $parentProduct = $product->parentProduct;
            $variants = $parentProduct->variants;
        } else {
            $parentProduct = $product;
            $variants = $product->variants;
        }
        if ($product->isVariant()) {
            // If it's a variant, fetch related products based on the parent ID
            $relatedProducts = Product::where('parent_id', $product->parent_id)
                ->orWhere('id', $product->parent_id) // Include the parent product itself
                ->where('id', '!=', $product->id)
                ->get();
        } else {
            // If it's a parent product, fetch related products based on the parent ID
            $relatedProducts = Product::where('parent_id', $product->id)
                ->orWhere('id', $parentProduct->id) // Include the parent product itself
                ->where('id', '!=', $product->id)
                ->get();
        }
        //dd($relatedProducts);

        //dd($parentProduct);
    return view('product.show', compact('currentProductId','product','sizes','parentProduct', 'variants', 'relatedProducts','products'));

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