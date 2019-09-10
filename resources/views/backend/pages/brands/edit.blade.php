@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Edit Brand
			</div>
			<div class="card-body">
				<form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $brand->name }}">
					</div>

					<div class="form-group">
						<label>Description (Optional)</label>
						<textarea name="description" rows="8" cols="80" class="form-control">{{ $brand->name }}</textarea>
					</div>

					<div class="form-group">
						<label for="oldimage">Brand Old Image</label><br>
						<img src="{{ asset('images/brands/'. $brand->image) }}" width="100"><br>

						<label for="newimage">Brand New Image (Optional)</label>
						<input type="file" class="form-control" id="image" name="image">
					</div>

					<button type="submit" class="btn btn-primary">Update Brand</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
