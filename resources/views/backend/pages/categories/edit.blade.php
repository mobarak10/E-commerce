@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Edit Category
			</div>
			<div class="card-body">
				<form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
					</div>

					<div class="form-group">
						<label>Description (Optional)</label>
						<textarea name="description" rows="8" cols="80" class="form-control">{{ $category->name }}</textarea>
					</div>

					<div class="form-group">
						<label>Parent Category (Optional)</label>
						<select name="parent_id" class="form-control">
							<option value="">Please Select a Category</option>
							@foreach ($main_categories as $cate)
								<option value="{{ $cate->id }}" {{ $cate->id == $category->parent_id ? 'selected' : ''}}>{{ $cate->name }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<label for="oldimage">Category Old Image</label><br>
						<img src="{{ asset('images/categories/'. $category->image) }}" width="100"><br>

						<label for="newimage">Category New Image (Optional)</label>
						<input type="file" class="form-control" id="image" name="image">
					</div>

					<button type="submit" class="btn btn-primary">Update Category</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
