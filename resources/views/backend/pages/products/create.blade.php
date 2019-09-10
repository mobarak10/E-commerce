@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header"> 
				Add Product
			</div>
			<div class="card-body">
				<form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="title">Title</label>
						<input type="text" class="form-control" id="title" name="title">
					</div>

					<div class="form-group">
						<label>Description</label>
						<textarea name="description" rows="8" cols="80" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="price">Price</label>
						<input type="number" class="form-control" id="price" name="price">
					</div>

					<div class="form-group">
						<label for="quantity">Quantity</label>
						<input type="number" class="form-control" id="quantity" name="quantity">
					</div>

					<div class="form-group">

						<label for="quantity">Select Category</label>
						<select name="category_id" class="form-control">
							<option value="">Please select a category</option>
							
							{{-- get all the category name from categories table from database --}}
							@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', NULL)->get() as $parent)
								
								{{-- get categories id from category table and store it in parent table in category_id column --}}
								<option value="{{ $parent->id }}">
									{{ $parent->name }}
								</option>
								
								{{-- get all the sub category name from categories table from database --}}
								@foreach (App\Models\Category::orderBy('name', 'asc')->where('parent_id', $parent->id)->get() as $child)

									<option value="{{ $child->id }}"> 
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
							
							{{-- same as category show upper --}}
							@foreach (App\Models\Brand::orderBy('name', 'asc')->get() as $brand)

								<option value="{{ $brand->id }}">
									{{ $brand->name }}
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

					<button type="submit" class="btn btn-primary">Add Product</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
