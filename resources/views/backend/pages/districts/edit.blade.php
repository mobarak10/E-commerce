@extends('backend.layout.master')

@section('content')

<!-- partial -->
<div class="main-panel">
	<div class="content-wrapper">
		<div class="card">
			<div class="card-header">
				Edit District
			</div>
			<div class="card-body">
				<form action="{{ route('admin.district.update', $district->id) }}" method="post" enctype="multipart/form-data">
					@csrf
					
					@include('backend.partial.messages')

					<div class="form-group">
						<label for="name">District Name</label>
						<input type="text" class="form-control" id="name" name="name" value="{{ $district->name }}">
					</div>

					<div class="form-group">
						<label for="division_id">Select Division for District</label>
						<select name="division_id" class="form-control">


							<option value="">Please select a division for district</option>

							@foreach ($divisions as $division)
								<option value="{{ $division->id }}" {{ ($district->division_id == $division->id) ? 'selected' : '' }}>{{ $division->name }}</option>
							@endforeach

						</select>
					</div>

					<button type="submit" class="btn btn-primary">Update District</button>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- main-panel ends -->

@endsection
