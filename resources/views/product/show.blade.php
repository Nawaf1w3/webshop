@extends('layout.nav-footer')



@section('content')

<style>
.product-sizes {
    display: flex;
    justify-content: space-between; /* Adjust spacing between sizes */
}

.product-size {
    flex-basis: 20%; /* Adjust size width */
    position: relative;
    width: 30px; /* Adjust the size of the square */
    height: 30px; /* Adjust the size of the square */
    background-color: #f0f0f0; /* Change color as needed */
    cursor: pointer;
}

.product-size input[type="radio"] {
    display: none; /* Hide the default radio button */
}

.product-size-label {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #000; /* Change color as needed */
    cursor: pointer;
}

/* Style when selected */
.product-size input[type="radio"]:checked + .product-size-label {
    background-color: #F28123; /* Change background color when selected */
    color: #fff; /* Change text color when selected */
}
.breadcrumb {
    font-size: 14px;
    color: #333;
    background-color: rgb(255, 255, 255);
}

.breadcrumb a {
    color: #414141;
    
}
.breadcrumb a:hover {
    text-decoration: underline !important;
}

.separator {
    margin: 0 5px;
    color: #333;
}

.separator::after {
    content: attr(data-content);
}

.separator:last-child {
    display: none;
}
.bullet{
    color: rgb(34, 207, 34);
    margin-right: 7px;
}
.container {
    margin:  auto !important; /* Center the container horizontally */
    max-width: 1200px !important; /* Set maximum width */
    padding: 0 20px !important; /* Add padding to the left and right */
    position: relative !important; /* Ensure positioning context */
}





</style> 

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
    <div class="mt-100 mb-100">
        <div class="container">
            <!-- breacamp -->
            <div class="breadcrumb">
                <a href="/">Home</a>
                <span class="separator">›</span>
                <a href="/products">men</a>
                <span class="separator">›</span>
                <a href="/kleding/t-shirts-tops">T-shirts & tops</a>
                <span class="separator">›</span>
                <a href="/kleding/t-shirts-tops/oversized">Oversized</a>
            </div>
            <!--end breacamp -->
            <div class="row" style="width: 85%; height: 85%;">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ asset($product->images->first()->path) }}" alt="Product Image">
                        <div class="additional-product-images">
                            <div class="row m-10">
                                @foreach($product->images->slice(1) as $image)
                                    <div class="p-2">
                                        <img src="{{ asset($image->path) }}" alt="Additional Product Image" class="img-thumbnail" style="width: 70px; height: 100px;">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="single-product-content">

                        <div class="row">
                            <h3>{{ $product->name }}</h3>
                               
                            <h3 class="pl-5"><strong>€ {{ $product->price }}</strong></h3>   
                        </div>
                        

                        <div class="select_color">
                            <p class="" style="color:#606060; font-size:12px;"><span></span>color</p>
                            <img class="" src="assets/img/products/white-hood.jpg"style="width: 100px; height: 150px;">
                            <p class="pt-1" style="color:#606060; font-size:12px;"><span></span>code: OTP241019-102</p>
                        </div>
                        <!--section line -->
                        <div class="border-top mt-3 mb-3"></div>
                        <!--end section line -->

                        <div class="select_size-div">
                            <div class="select-size-text">
                                <p style="color:#606060; font-size:12px;"><span></span>select size</p>
                            </div>
                            <div class="product-sizes">

                                <div class="product-size">
                                    <input type="radio" id="size_S" class="size-radio select-size options-select" name="product-size" value="S">
                                    <label class="product-size-label" for="size_S">S</label>
                                </div>
                                <div class="product-size">
                                    <input type="radio" id="size_XS" class="size-radio select-size options-select" name="product-size" value="XS">
                                    <label class="product-size-label" for="size_XS">XS</label>
                                </div>
                                <div class="product-size">
                                    <input type="radio" id="size_L" class="size-radio select-size options-select" name="product-size" value="L">
                                    <label class="product-size-label" for="size_L">L</label>
                                </div>
                                <div class="product-size">
                                    <input type="radio" id="size_XL" class="size-radio select-size options-select" name="product-size" value="XL">
                                    <label class="product-size-label" for="size_XL">XL</label>
                                </div>
                                <div class="product-size">
                                    <input type="radio" id="size_XXL" class="size-radio select-size options-select" name="product-size" value="XXL">
                                    <label class="product-size-label" for="size_XXL">XXL</label>
                                </div>
                            </div>
                        </div>
                        <!--section line -->
                        <div class="border-top mt-3 mb-3"></div>
                         <!--end section line -->
                        <div class="single-product-form">
                            <div>
                                <p style="color:green; font-size:11px;"></span > op vooraad</p>
                                <a href="" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <div class="">
                                    <p style="color:#606060; font-size:12px;"><span class="bullet">&#10003;</span> Gratis bezorging vanaf €59,95</p>
                                    <p style="color:#606060; font-size:12px;"><span class="bullet">&#10003;</span> Voor 20:30 besteld, morgen in huis</p>
                                    <p style="color:#606060; font-size:12px;"><span class="bullet">&#10003;</span> Achteraf betalen via Klarna</p>
                                </div>
                            </div>
                        </div>

                        <!--section line -->
                        <div class="border-top mt-3 mb-3"></div>
                        <!--end section line -->
                        
                        <div class="product_info">
                            <p style="color:#606060; font-size:12px;"><strong>info: </strong> {{ $product->description }} </p>
                        </div>

                        <!--section line -->
                        <div class="border-top mt-3 mb-3"></div>
                        <!--end section line -->

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
            <div class="border-top mt-3 mb-3"></div>
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













