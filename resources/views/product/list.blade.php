@extends('layout.nav-footer')



@section('content')


<style>

</style>
    
    
    <!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Shop</h1>
					</div>
					<div>
							<a href="/products/create">add product +</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- products -->
	<div class="product-section mt-150 mb-150">
		<div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">	
                        <h3><span class="orange-text">Our</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
                    </div>
                </div>
            </div>
			<div class="row">
				<div class="col-md-12">
					<div class="product-filters">
						<ul>
							@foreach($categories as $category)
								<li class="" data-filter="{{ $category->id }}" onclick="filterProducts({{ $category->id }})">{{ $category->name }}</li>
							@endforeach
						</ul>
					</div>
					
					<div class="row product-lists" style="position: relative;">
						@foreach($products as $product)
							<div class="col-lg-4 col-md-6 text-center strawberry product-item" data-category="{{ $product->category_id }}">
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
						@endforeach
					</div>
				</div>
			</div>
		
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="pagination-wrap">
						<ul>
							<li><a href="#">Prev</a></li>
							<li><a href="#">1</a></li>
							<li><a class="active" href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
            </div>	
        </div>
    </div>
	<!-- end products -->

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
	<!-- end logo carousel -->


    @endsection

