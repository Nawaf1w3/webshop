@extends('layout.nav-footer')

@section('content')

    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <h1>product form</h1>
                    </div>
                    <div>
                        <a href="/products">back to the shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--add products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                        <h3><span class="orange-text">add</span> Product</h3>
                        <p></p>
                    </div>
                </div>
            </div>
            <div class="product-section ">
                <div class="container">
                    <div class="row product-lists" style="position: relative;">
                        <div class="container">
                            <div class="card">
                                <div class="card-header">
                                    add product
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="productName">Product Name:</label>
                                            <input type="text" class="form-control" id="productName" name="productName" placeholder="Enter product name">
                                        </div>
                                        <div class="form-group">
                                            <label for="productDescription">Product Description:</label>
                                            <textarea class="form-control" id="productDescription" name="productDescription" placeholder="Enter product description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Product price:</label>
                                            <input class="form-control" id="price" name="price" placeholder="Enter product price">
                                        </div>
                                        <div>
                                            <label for="categorie">categorie</label>
                                            <select class="custom-select" id="categorie" name="categorie">
                                                <option selected>Choose...</option>
                                                @foreach ($categories as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="DisplayImage">product display image</label>
                                            <input type="file" class="form-control-file" id="DisplayImage" name="DisplayImage">
                                        </div>
                                        <div class="form-group">
                                            <label for="ProductImage">product images</label>
                                            <input type="file" class="form-control-file" id="ProductImages" name="ProductImage">
                                        </div>
                                        <div class="form-group">
                                            <label for="ProductImage2">product images</label>
                                            <input type="file" class="form-control-file" id="ProductImage2" name="ProductImage2">
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-block">Add product</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection