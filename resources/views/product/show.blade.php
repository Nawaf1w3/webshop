@extends('layout.nav-footer')



@section('content')

<style>


.product-scroll-container {
    overflow-x: auto;
    white-space: nowrap;
    padding-left: 50px;
}

.product-scroll-wrapper {
    display: inline-flex;
}

.product-scroll-item {
    flex: 0 0 auto;
    margin-right: 15px;
    text-align: center;
}

.product-scroll-image {
    width: 300px;
    height: 300px;
    object-fit: cover;
}

.product-scroll-name {
    font-size: 14px;
    margin-top: 5px;
}

.product-scroll-price {
    font-size: 12px;
    color: #888;
    margin-top: 3px;
}


.product-scroll-item a {
    text-decoration: none;
    color: inherit;
}

/* Hide scrollbar in WebKit browsers */
.product-scroll-container::-webkit-scrollbar {
    
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
            <div class="row">
                    <div class="col-md-5">
                        <div class="single-product-img-show">
                            <img src="{{ asset($product->images->first()->path) }}" alt="Product Image" class="main-product-image">
                            <div class="additional-product-images">
                                <div class="row m-10">
                                    @foreach($product->images as $index => $image)
                                        <div class="p-2 additional-image" data-index="{{ $index }}">
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
                               
                            <h3 class="pl-5">€ {{ $product->price }}</h3>   
                        </div>

                            <!--section line -->
                            <div class="border-top mt-3 mb-3"></div>
                            <!--end section line -->

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
                                    <p style="color:#606060; font-size:12px;"><span></span>Select Size</p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($sizes as $size)
                                    <div class="product-size">
                                        <input type="radio" id="size_{{ $size->id }}" class="size-radio select-size options-select" name="product-size" value="{{ $size->id }}" {{ $size->pivot->quantity_available == 0 ? 'disabled' : '' }}>
                                        <label class="product-size-label" for="size_{{ $size->id }}">{{ $size->name }}</label>
                                    </div>
                                @endforeach                         
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

                        
                        <div class="m-auto">
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
            </div>
        </div>
    </div>

    <!--section line -->
    <div class="border-top pt-3 pb-3"></div>
    <!--end section line -->

        <div class="pl-5"><h3>Related</h3></div>
        <!-- more products -->
        <div class="product-scroll-container">
            <div class="product-scroll-wrapper">
                @foreach($products as $product)
                    @if($product->id !== $currentProductId)
                        <div class="product-scroll-item">
                            <a href="/products/{{ $product->id }}">
                                <img src="{{ asset($product->images->first()->path) }}" alt="Product Image" class="product-scroll-image">
                                <h3 class="product-scroll-name">{{ $product->name }}</h3>
                                <h3 class="product-scroll-price">€ {{ $product->price }}</h3>
                            </a>
                        </div>
                    @endif
                @endforeach
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



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.additional-image').click(function() {
            var imagePath = $(this).find('img').attr('src');
            $('.main-product-image').attr('src', imagePath);
        });
    });
</script>










