@extends('layout.nav-footer')



@section('content')


<style>
.category-btn {
  margin-bottom: 80px;
}

.category-btn {
  margin: 0;
  padding: 0;
  list-style: none;
  text-align: center;
}

.category-btn  {
  display: inline-block;
  font-weight: 700;
  font-size: 18px;
  margin: 15px;
  border: 2px solid #051922;
  color: #323232;
  cursor: pointer;
  padding: 8px 20px;
  border-radius: 25px;
}

.category-btn.active {
  border: 2px solid #F28123;
  background-color: #F28123;
  color: #fff;
}
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
	<div class="product-section mt-12 mb-12">
		<div class="container mx-auto">
			<div class="text-center">
				<div class="section-title">
					<h3><span class="text-orange">Our</span> Products</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet beatae optio.</p>
				</div>
			</div>
			<div class="flex justify-center">
				<div class="categories">
					<button class="category-btn">All</button>
					@foreach($categories as $category)
						<button class="category-btn" data-category="{{ $category->id }}">{{ $category->name }}</button>
					@endforeach
				</div>
			</div>
			<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
				@foreach($products as $product)
					<div class="text-center strawberry product-item" data-category="{{ $product->category_id }}">
						<div class="single-product-item">
							<div class="product-image">
								<a href="/products/{{ $product->id }}">
									@if ($product->images->isNotEmpty())
										<img class="product-image" src="{{ asset($product->images->first()->path) }}" alt="Product Image">
									@else
										<p>No image available</p>
									@endif
								</a>
							</div>
							<h3>{{ $product->name }}</h3>
							<p>€ {{ $product->price }}</p>
						</div>
					</div>
				@endforeach
			</div>
			<div class="text-center mt-6">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
	document.addEventListener('DOMContentLoaded', function () {
		const categoryBtns = document.querySelectorAll('.category-btn');
		const productItems = document.querySelectorAll('.product-item');

		categoryBtns.forEach(btn => {
			btn.addEventListener('click', () => {
				const categoryId = btn.dataset.category;

				productItems.forEach(item => {
					if (categoryId == 0 || item.dataset.category == categoryId) {
						item.style.display = 'block';
					} else {
						item.style.display = 'none';
					}
				});
			});
		});
	});
	
</script>