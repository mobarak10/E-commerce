@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Edit Product
			</div>
			<div class="card-body">
				{{-- in admin.product.update Route pass the product id --}}
				<form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea name="description" rows="8" cols="80" class="form-control">{{ $product->description }}</textarea>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						<input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}">
					</div>

					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input type="number" class="form-control" id="quantity" name="quantity" value="{{ $product->quantity }}">
					</div>

					<div class="form-group">
						<label for="quantity">Select Category</label>
						<select name="category_id" class="form-control">
							<option value="">Please select a category</option>
							
							{{-- get all the category name from categories table from database --}}
							@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
								
								{{-- if value is parent id show parent name in select category box --}}
								<option value="{{ $parent->id }}" {{ $parent->id == $product->category->id ? 'selected' : '' }}>
									{{ $parent->name }}
								</option>
								
								@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)
									
									{{-- if value is child id show child name in select category box --}}
									<option value="{{ $child->id }}" {{ $child->id == $product->category->id ? 'selected' : '' }}>

									 ------>{{ $child->name }}

									</option>
								@endforeach
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="quantity">Select Brand</label>
						<select name="brand_id" class="form-control">
							<option value="">Please select a brand</option>
							
							{{-- get all the brand name from brand table from database --}}
							@foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brnd)
								
								{{-- given child value show in select brand box--}}
								<option value="{{ $brnd->id }}" {{ $brnd->id == $product->brand->id ? 'selected' : '' }}>
									{{ $brnd->name }}
								</option>

							@endforeach
						</select> 
					</div>

					<div class="form-group">
						<label for="product_image">Product Image</label>
						<div class="row">
							<div class="col-md-3">
								<input type="file" class="form-control" id="product_image" name="product_image[]">
							</div>
							<div class="col-md-3">
								<input type="file" class="form-control" id="product_image" name="product_image[]">
							</div>
							<div class="col-md-3">
								<input type="file" class="form-control" id="product_image" name="product_image[]">
							</div>
							<div class="col-md-3">
								<input type="file" class="form-control" id="product_image" name="product_image[]">
							</div>
						</div>
					</div>

					<button type="submit" class="btn btn-primary">Update Product</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
