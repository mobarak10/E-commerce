@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Add Brand
			</div>
			<div class="card-body">
				<form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>

					<div class="form-group">
						<label>Description (optional)</label>
						<textarea name="description" rows="8" cols="80" class="form-control"></textarea>
					</div>

					<div class="form-group">
						<label for="image">Brand Image (optional)</label>
						<input type="file" class="form-control" id="image" name="image">
					</div>

					<button type="submit" class="btn btn-primary">Add Brand</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
