<div class="row">

	@foreach ($products as $product)
		
	<div class="col-md-3">
		<div class="card mt-1">
			
			@php $i = 1; @endphp
			@foreach ($product->images as $image)
			@if ($i > 0)
				<a href="{{ route('product.show', $product->slug) }}">
					<img class="card-img-top img-respponsive" src="{{ asset('images/products/'.$image->image) }}" alt="{{ $product->title }}" width="100px">
				</a>
			@endif

			@php $i --; @endphp	
			@endforeach


			<div class="card-body">
				<h4 class="card-title">
					<a href="{{ route('product.show', $product->slug) }}">{{ $product->title }}</a>
				</h4>
				<p class="card-text">Taka {{ $product->price }}</p>
				@include('frontend.pages.products.partials.cart-button')
			</div>
		</div>
	</div>

	@endforeach

</div>
<div class="pagination mt-2">
	{{ $products->links() }}	
</div>