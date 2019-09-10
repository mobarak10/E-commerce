@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Add Division
			</div>
			<div class="card-body">
				<form action="{{ route('admin.division.store') }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="name">Division Name</label>
						<input type="text" class="form-control" id="name" name="name">
					</div>

					<div class="form-group">
						<label for="name">Priority</label>
						<input type="text" name="priority" class="form-control" id="name">
					</div>

					<button type="submit" class="btn btn-primary">Add Division</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
