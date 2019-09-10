@extends('frontend.layouts.master')

@section("content")
<!-- start sidebar + content -->
<div class="container margin-top-20">
	<div class="row">
		<div class="col-md-4">
			
			@include('frontend.partial.product_sidebar')

		</div>
		<div class="col-md-8">
			<div class="widget">
				<h3>All Products</h3>
				@include('frontend.pages.products.partials.all_products')
			</div>
			<div class="widget">
				
			</div>
		</div>		
	</div>
</div>
<!-- end sidebar + content -->
@endsection