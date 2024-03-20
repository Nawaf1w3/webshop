@extends('layout.nav-footer')



@section('content')



	  <!-- breadcrumb-section -->
      <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>See more Details</p>
                        <h1>Single Product</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-100 mb-100">
        <div class="container">
            <div class="row" style="width: 80%; height: 80%;">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset($product->images->first()->path) }}" alt="Product Image">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3>{{ $product->name }}</h3>
                        <p class="single-product-pricing"><span></span> ${{ $product->price }}</p>
                        <p>{{ $product->description }}</p>
                        <div class="single-product-form">
                            <!-- Add your form or other elements here -->
                            <a href="" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                            <p><strong>Categories: </strong>{{ $product->category->name }}</p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="additional-product-images">
                <div class="row m-10">
                    @foreach($product->images->slice(1) as $image)
                        <div class="p-2">
                            <img src="{{ asset($image->path) }}" alt="Additional Product Image" class="img-thumbnail" style="width: 150px; height: 200px;">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

   

	<!-- more products -->
    <div class="product-section">
        <div class="container">
            <div class="row product-lists" style="position: relative;">
                @foreach($products as $product)
                    @if($product->id !== $currentProductId) <!-- Exclude the current product -->
                        <div class="col-lg-4 col-md-6 text-center strawberry">
                            <div class="single-product-item">
                                <div class="product-image">
                                    <a href="/products/{{$product->id}}">
                                        @if ($product->images->isNotEmpty())
                                               <img class="product-image"src="{{ asset($product->images->first()->path) }}" alt="Product Image">
                                        @else
                                            <p>No image available</p>
                                        @endif
                                    </a>
                                </div>
                                <h3>{{ $product->name }}</h3>
                                <p>€ {{ $product->price }} </p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
	<!-- end more products -->

	<!-- logo carousel -->
	<div class="logo-carousel-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="logo-carousel-inner">
						<div class="single-logo-item">
							<img src="assets/img/company-logos/1.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/2.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/3.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/4.png" alt="">
						</div>
						<div class="single-logo-item">
							<img src="assets/img/company-logos/5.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection













